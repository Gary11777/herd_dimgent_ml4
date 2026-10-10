<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import {
    Award,
    BatteryLow,
    CheckCircle2,
    Compass,
    Download,
    ExternalLink,
    Feather,
    Footprints,
    Landmark,
    ShieldCheck,
    UserCheck,
    Wrench,
    Zap,
} from '@lucide/vue';
import { ref } from 'vue';
import PageHero from '@/components/site/PageHero.vue';
import { Button } from '@/components/ui/button';

const photos = [
    { src: '/images/garand101/main.jpg', alt: 'Garand 101 — main photo' },
    { src: '/images/garand101/photo-5.jpg', alt: 'Garand 101 in the field' },
    { src: '/images/garand101/photo-6.jpg', alt: 'Garand 101 — detail view' },
    { src: '/images/garand101/photo-7.jpg', alt: 'Garand 101 — operation' },
    {
        src: '/images/garand101/photo-8.jpg',
        alt: 'Garand 101 — device close-up',
    },
    { src: '/images/garand101/photo-10.jpg', alt: 'Garand 101 — field use' },
    {
        src: '/images/garand101/photo-11.jpg',
        alt: 'Garand 101 — with accessories',
    },
    {
        src: '/images/garand101/photo-12.jpg',
        alt: 'Garand 101 — transport case',
    },
    { src: '/images/garand101/bag-forest.jpg', alt: 'Garand 101 in a forest' },
];

const activePhoto = ref(0);

const targetAreas = [
    { icon: Footprints, title: 'Archaeological research' },
    { icon: Feather, title: 'Environmental monitoring' },
    { icon: ShieldCheck, title: 'Forensic investigations' },
    { icon: Compass, title: 'Geological studies' },
    { icon: Landmark, title: 'Civil engineering' },
    { icon: UserCheck, title: 'Peace-time military applications' },
];

const technology = [
    {
        icon: BatteryLow,
        title: 'Lower energy consumption',
        description: 'Reduced energy consumption and device weight.',
    },
    {
        icon: Wrench,
        title: 'Simpler construction',
        description: 'Simplified construction and maintenance.',
    },
    {
        icon: Zap,
        title: 'Longer operating time',
        description: 'Increased operating time on a single charge.',
    },
];

const advantages = [
    'Innovative magnetic field measurement technology',
    'Fully digital device — improved noise stability during operation',
    'User-friendly visualization system and interface for easy object detection',
    'Reliable and robust design',
    'Expanded detection area due to optimized design solutions',
    'Plug-and-play operation',
    'Affordable price',
];
</script>

<template>
    <Head title="Products" />

    <PageHero
        eyebrow="Products"
        title="Garand 101"
        description="A high-resolution fluxgate magnetometer-gradiometer. “Magnetic detection can be easy and convenient!”"
    />

    <!-- Gallery -->
    <section class="py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-6 lg:grid-cols-5">
                <div
                    class="overflow-hidden rounded-2xl border border-border bg-muted shadow-lg lg:col-span-3"
                >
                    <img
                        :src="photos[activePhoto].src"
                        :alt="photos[activePhoto].alt"
                        class="aspect-square w-full object-cover"
                    />
                </div>
                <div
                    class="grid grid-cols-4 gap-3 sm:grid-cols-8 lg:col-span-2 lg:grid-cols-2"
                >
                    <button
                        v-for="(photo, index) in photos"
                        :key="photo.src"
                        type="button"
                        class="overflow-hidden rounded-lg border bg-muted transition-all"
                        :class="
                            index === activePhoto
                                ? 'border-primary ring-2 ring-ring/50'
                                : 'border-border opacity-70 hover:opacity-100'
                        "
                        @click="activePhoto = index"
                    >
                        <img
                            :src="photo.src"
                            :alt="photo.alt"
                            class="aspect-square w-full object-cover"
                        />
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Overview -->
    <section class="border-t border-border/60 bg-muted/30 py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-2 lg:gap-16">
                <div>
                    <h2
                        class="text-3xl font-bold tracking-tight text-foreground"
                    >
                        Overview
                    </h2>
                    <p class="mt-4 leading-relaxed text-muted-foreground">
                        Garand 101 is a high-resolution fluxgate
                        magnetometer-gradiometer designed to measure disruptions
                        in the Earth's magnetic field caused by ferromagnetic
                        objects. It provides reliable detection of metals such
                        as iron, steel, and nickel.
                    </p>
                    <p class="mt-4 leading-relaxed text-muted-foreground">
                        The device is designed for one-person operation, being
                        lightweight, user-friendly, reliable, and low-cost.
                    </p>
                </div>
                <div>
                    <h2
                        class="text-3xl font-bold tracking-tight text-foreground"
                    >
                        Key technology
                    </h2>
                    <p class="mt-4 leading-relaxed text-muted-foreground">
                        Garand 101 implements a new magnetic field measurement
                        technology that:
                    </p>
                    <ul class="mt-6 space-y-4">
                        <li
                            v-for="item in technology"
                            :key="item.title"
                            class="flex items-start gap-3"
                        >
                            <div
                                class="mt-0.5 flex size-9 shrink-0 items-center justify-center rounded-lg bg-primary/10 text-primary"
                            >
                                <component :is="item.icon" class="size-4" />
                            </div>
                            <div>
                                <p class="font-medium">{{ item.title }}</p>
                                <p class="text-sm text-muted-foreground">
                                    {{ item.description }}
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Target areas -->
    <section class="py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2
                class="text-3xl font-bold tracking-tight text-foreground sm:text-4xl"
            >
                Target areas
            </h2>
            <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <div
                    v-for="area in targetAreas"
                    :key="area.title"
                    class="flex items-center gap-4 rounded-xl border border-border bg-card p-5 shadow-sm"
                >
                    <div
                        class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-primary/10 text-primary"
                    >
                        <component :is="area.icon" class="size-5" />
                    </div>
                    <p class="font-medium">{{ area.title }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Advantages -->
    <section class="border-t border-border/60 bg-muted/30 py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-2 lg:gap-16">
                <div>
                    <h2
                        class="text-3xl font-bold tracking-tight text-foreground"
                    >
                        Advantages over other magnetometers
                    </h2>
                    <p class="mt-4 leading-relaxed text-muted-foreground">
                        Garand 101 combines an innovative measurement principle
                        with a practical, field-proven design.
                    </p>
                </div>
                <ul class="space-y-3">
                    <li
                        v-for="(advantage, index) in advantages"
                        :key="index"
                        class="flex items-start gap-3 rounded-xl border border-border bg-card p-4 shadow-sm"
                    >
                        <CheckCircle2
                            class="mt-0.5 size-5 shrink-0 text-primary"
                        />
                        <span class="leading-relaxed">{{ advantage }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Documentation -->
    <section class="py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div
                class="flex flex-col items-start justify-between gap-6 rounded-2xl border border-border bg-card p-8 shadow-sm lg:flex-row lg:items-center lg:p-12"
            >
                <div class="flex items-start gap-4">
                    <div
                        class="flex size-12 shrink-0 items-center justify-center rounded-xl bg-primary/10 text-primary"
                    >
                        <Award class="size-6" />
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold tracking-tight">
                            Documentation
                        </h2>
                        <p class="mt-2 text-muted-foreground">
                            Download the product presentation of Garand 101, or
                            visit the dedicated website for more information.
                        </p>
                    </div>
                </div>
                <div class="flex flex-wrap gap-3">
                    <Button as-child variant="outline">
                        <a
                            href="/files/garand101-product-presentation.pdf"
                            target="_blank"
                            rel="noopener"
                        >
                            <Download class="size-4" />
                            Product presentation (PDF)
                        </a>
                    </Button>
                    <Button as-child>
                        <a
                            href="http://www.gradiometr.com"
                            target="_blank"
                            rel="noopener"
                        >
                            www.gradiometr.com
                            <ExternalLink class="size-4" />
                        </a>
                    </Button>
                </div>
            </div>
        </div>
    </section>
</template>
