<script setup lang="ts">
defineProps<{
    eyebrow?: string;
    title: string;
    description?: string;
}>();
</script>

<template>
    <section class="border-b border-border/60 bg-muted/30">
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 sm:py-20 lg:px-8">
            <p
                v-if="eyebrow"
                class="text-sm font-semibold tracking-wider text-primary uppercase"
            >
                {{ eyebrow }}
            </p>
            <h1
                class="mt-2 text-4xl font-bold tracking-tight text-foreground sm:text-5xl"
            >
                {{ title }}
            </h1>
            <p
                v-if="description"
                class="mt-4 max-w-2xl text-lg leading-relaxed text-muted-foreground"
            >
                {{ description }}
            </p>
        </div>
    </section>
</template>
