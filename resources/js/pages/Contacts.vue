<script setup lang="ts">
import { Head, useForm, usePage } from '@inertiajs/vue3';
import { CheckCircle2, Loader2, Mail, MapPin, Send } from '@lucide/vue';
import { computed, ref } from 'vue';
import AlertError from '@/components/AlertError.vue';
import InputError from '@/components/InputError.vue';
import PageHero from '@/components/site/PageHero.vue';
import TurnstileWidget from '@/components/site/TurnstileWidget.vue';
import { Alert, AlertDescription, AlertTitle } from '@/components/ui/alert';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { store } from '@/routes/contacts';

const siteKey = computed(
    () => (usePage().props.turnstileSiteKey as string) || '',
);

const turnstile = ref<InstanceType<typeof TurnstileWidget> | null>(null);
const verificationError = ref('');

const form = useForm({
    name: '',
    email: '',
    subject: '',
    message: '',
    // Honeypot field: must stay empty for human submissions.
    website: '',
    'cf-turnstile-response': '',
});

const submit = async () => {
    verificationError.value = '';

    try {
        form['cf-turnstile-response'] = (await turnstile.value?.verify()) ?? '';
    } catch (error) {
        verificationError.value =
            error instanceof Error
                ? error.message
                : 'Human verification failed. Please try again.';
        return;
    }

    form.post(store.url(), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            turnstile.value?.reset();
        },
    });
};
</script>

<template>
    <Head title="Contacts" />

    <PageHero
        eyebrow="Contacts"
        title="Get in touch"
        description="For more information, please email us — or send a message using the form below."
    />

    <section class="py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-5 lg:gap-16">
                <!-- Contact info -->
                <div class="space-y-6 lg:col-span-2">
                    <div
                        class="flex items-start gap-4 rounded-xl border border-border bg-card p-6 shadow-sm"
                    >
                        <div
                            class="flex size-11 shrink-0 items-center justify-center rounded-lg bg-primary/10 text-primary"
                        >
                            <Mail class="size-5" />
                        </div>
                        <div>
                            <h2 class="font-semibold">Email</h2>
                            <p class="mt-1 text-sm text-muted-foreground">
                                For more information, please email us on:
                            </p>
                            <a
                                href="mailto:info@dimgent.com"
                                class="mt-1 inline-block font-medium text-primary hover:underline"
                            >
                                info@dimgent.com
                            </a>
                        </div>
                    </div>
                    <div
                        class="flex items-start gap-4 rounded-xl border border-border bg-card p-6 shadow-sm"
                    >
                        <div
                            class="flex size-11 shrink-0 items-center justify-center rounded-lg bg-primary/10 text-primary"
                        >
                            <MapPin class="size-5" />
                        </div>
                        <div>
                            <h2 class="font-semibold">Location</h2>
                            <p class="mt-1 text-sm text-muted-foreground">
                                Dimgent Technologies development center
                            </p>
                            <p class="font-medium">Minsk, Belarus</p>
                        </div>
                    </div>
                    <div
                        class="rounded-xl border border-border bg-muted/30 p-6"
                    >
                        <h2 class="font-semibold">Working with us</h2>
                        <p
                            class="mt-2 text-sm leading-relaxed text-muted-foreground"
                        >
                            We work with clients from all over the world. The
                            Internet brings us nearer than ever before — we will
                            keep you updated on the progress of your project
                            with photos and video if you wish.
                        </p>
                    </div>
                </div>

                <!-- Contact form -->
                <div
                    class="rounded-2xl border border-border bg-card p-6 shadow-sm lg:col-span-3 lg:p-10"
                >
                    <h2 class="text-2xl font-bold tracking-tight">
                        Send us a message
                    </h2>
                    <p class="mt-2 text-sm text-muted-foreground">
                        Fill in the form below and we will get back to you as
                        soon as possible.
                    </p>

                    <Alert
                        v-if="form.recentlySuccessful"
                        class="mt-6 border-green-500/40 bg-green-500/10"
                    >
                        <CheckCircle2 class="size-4 text-green-600" />
                        <AlertTitle>Message sent</AlertTitle>
                        <AlertDescription>
                            Thank you! Your message has been sent. We will get
                            back to you soon.
                        </AlertDescription>
                    </Alert>

                    <AlertError
                        v-if="Object.keys(form.errors).length > 0"
                        :errors="Object.values(form.errors)"
                        title="Please fix the errors below."
                        class="mt-6"
                    />

                    <form class="mt-8 space-y-6" @submit.prevent="submit">
                        <!-- Honeypot: hidden from humans, attractive to bots -->
                        <div
                            class="absolute -top-[9999px] -left-[9999px]"
                            aria-hidden="true"
                        >
                            <Label for="website">Website</Label>
                            <Input
                                id="website"
                                v-model="form.website"
                                type="text"
                                name="website"
                                tabindex="-1"
                                autocomplete="off"
                            />
                        </div>

                        <div class="grid gap-6 sm:grid-cols-2">
                            <div class="space-y-2">
                                <Label for="name">Name</Label>
                                <Input
                                    id="name"
                                    v-model="form.name"
                                    type="text"
                                    name="name"
                                    placeholder="Your name"
                                    required
                                    :aria-invalid="!!form.errors.name"
                                />
                                <InputError :message="form.errors.name" />
                            </div>
                            <div class="space-y-2">
                                <Label for="email">Email</Label>
                                <Input
                                    id="email"
                                    v-model="form.email"
                                    type="email"
                                    name="email"
                                    placeholder="you@example.com"
                                    required
                                    :aria-invalid="!!form.errors.email"
                                />
                                <InputError :message="form.errors.email" />
                            </div>
                        </div>

                        <div class="space-y-2">
                            <Label for="subject">Subject (optional)</Label>
                            <Input
                                id="subject"
                                v-model="form.subject"
                                type="text"
                                name="subject"
                                placeholder="What is this about?"
                                :aria-invalid="!!form.errors.subject"
                            />
                            <InputError :message="form.errors.subject" />
                        </div>

                        <div class="space-y-2">
                            <Label for="message">Message</Label>
                            <textarea
                                id="message"
                                v-model="form.message"
                                name="message"
                                rows="6"
                                required
                                placeholder="Tell us about your project or question..."
                                class="h-auto min-h-32 w-full rounded-md border border-input bg-transparent px-3 py-2 text-base shadow-xs transition-[color,box-shadow] outline-none placeholder:text-muted-foreground focus-visible:border-ring focus-visible:ring-[3px] focus-visible:ring-ring/50 disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 aria-invalid:border-destructive aria-invalid:ring-destructive/20 md:text-sm dark:bg-input/30 dark:aria-invalid:ring-destructive/40"
                                :class="
                                    form.errors.message
                                        ? 'border-destructive'
                                        : ''
                                "
                                :aria-invalid="!!form.errors.message"
                            />
                            <InputError :message="form.errors.message" />
                        </div>

                        <div class="space-y-2">
                            <TurnstileWidget
                                v-if="siteKey"
                                ref="turnstile"
                                v-model="form['cf-turnstile-response']"
                                :site-key="siteKey"
                            />
                            <InputError
                                :message="
                                    form.errors['cf-turnstile-response'] ||
                                    verificationError
                                "
                            />
                            <p
                                v-if="siteKey"
                                class="text-xs text-muted-foreground"
                            >
                                Protected by Cloudflare Turnstile. Your data
                                stays private — verification happens in the
                                background.
                            </p>
                        </div>

                        <div class="flex items-center justify-between gap-4">
                            <Button
                                type="submit"
                                size="lg"
                                :disabled="form.processing"
                            >
                                <Loader2
                                    v-if="form.processing"
                                    class="size-4 animate-spin"
                                />
                                <Send v-else class="size-4" />
                                {{
                                    form.processing
                                        ? 'Sending...'
                                        : 'Send message'
                                }}
                            </Button>
                            <p class="text-xs text-muted-foreground">
                                We usually reply within one business day.
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>
