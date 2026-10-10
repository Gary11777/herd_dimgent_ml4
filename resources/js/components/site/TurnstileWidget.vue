<script setup lang="ts">
import { onMounted, onUnmounted, ref } from 'vue';

type TurnstileApi = {
    render: (el: HTMLElement, options: Record<string, unknown>) => string;
    execute: (widgetId: string) => void;
    reset: (widgetId: string) => void;
    remove: (widgetId: string) => void;
};

declare global {
    interface Window {
        turnstile?: TurnstileApi;
    }
}

const props = defineProps<{
    siteKey: string;
}>();

const token = defineModel<string>({ default: '' });

const widgetEl = ref<HTMLElement | null>(null);
let widgetId: string | null = null;
let pendingResolve: ((value: string) => void) | null = null;
let pendingReject: ((reason: Error) => void) | null = null;

const SCRIPT_URL = 'https://challenges.cloudflare.com/turnstile/v0/api.js';

function loadScript(): Promise<void> {
    if (window.turnstile) {
        return Promise.resolve();
    }

    const existing = document.querySelector(`script[src^="${SCRIPT_URL}"]`);

    if (existing) {
        return new Promise((resolve) => {
            const check = () =>
                window.turnstile ? resolve() : setTimeout(check, 50);
            check();
        });
    }

    return new Promise((resolve, reject) => {
        const script = document.createElement('script');
        script.src = `${SCRIPT_URL}?render=explicit`;
        script.async = true;
        script.defer = true;
        script.onload = () => resolve();
        script.onerror = () =>
            reject(new Error('Failed to load Cloudflare Turnstile.'));
        document.head.appendChild(script);
    });
}

onMounted(async () => {
    if (!props.siteKey || !widgetEl.value) {
        return;
    }

    try {
        await loadScript();
    } catch {
        return;
    }

    if (!window.turnstile || !widgetEl.value) {
        return;
    }

    widgetId = window.turnstile.render(widgetEl.value, {
        sitekey: props.siteKey,
        size: 'invisible',
        execution: 'render',
        callback: (value: string) => {
            token.value = value;
            if (pendingResolve) {
                pendingResolve(value);
                pendingResolve = null;
                pendingReject = null;
            }
        },
        'error-callback': () => {
            token.value = '';
            if (pendingReject) {
                pendingReject(
                    new Error('Human verification failed. Please try again.'),
                );
                pendingResolve = null;
                pendingReject = null;
            }
        },
        'expired-callback': () => {
            token.value = '';
        },
    });
});

onUnmounted(() => {
    if (widgetId && window.turnstile) {
        window.turnstile.remove(widgetId);
        widgetId = null;
    }
});

/**
 * Resolve with a Turnstile token, executing the invisible challenge
 * on demand when no token is available yet.
 */
function verify(): Promise<string> {
    if (!props.siteKey) {
        return Promise.resolve('');
    }

    if (token.value) {
        return Promise.resolve(token.value);
    }

    return new Promise((resolve, reject) => {
        if (!widgetId || !window.turnstile) {
            reject(
                new Error(
                    'Human verification is not available. Please reload the page.',
                ),
            );
            return;
        }

        pendingResolve = resolve;
        pendingReject = reject;

        window.turnstile.execute(widgetId);

        setTimeout(() => {
            if (pendingReject) {
                pendingReject(
                    new Error(
                        'Human verification timed out. Please try again.',
                    ),
                );
                pendingResolve = null;
                pendingReject = null;
            }
        }, 15000);
    });
}

function reset(): void {
    token.value = '';
    if (widgetId && window.turnstile) {
        window.turnstile.reset(widgetId);
    }
}

defineExpose({ verify, reset });
</script>

<template>
    <div ref="widgetEl" aria-hidden="true" />
</template>
