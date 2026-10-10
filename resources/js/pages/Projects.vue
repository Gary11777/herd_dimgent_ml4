<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import {
    ArrowRight,
    Building2,
    Cpu,
    Gauge,
    Headphones,
    HeartPulse,
    Radio,
    Wrench,
} from '@lucide/vue';
import PageHero from '@/components/site/PageHero.vue';
import { Button } from '@/components/ui/button';
import { contacts, services } from '@/routes';

const categories = [
    {
        icon: Building2,
        title: 'Systems',
        items: [
            'Control rooms with the use of the public telephone networks, GSM connection and radio channels with frequencies up to 900 MHz (for use in various businesses: elevators, communal services such as hydraulic lifting systems and engineering communications, water intake systems).',
            'Automated microelectronic circuits testers, electronic boards testing.',
        ],
    },
    {
        icon: Wrench,
        title: 'Tools',
        items: [
            'Testers for microelectronic circuits, electronic boards testing.',
            'Tools for archaeological and geological use (gradiometers, electronic probes).',
            'Remote-reading gauges to collect information from sensors.',
        ],
    },
    {
        icon: Headphones,
        title: 'Everyday technology',
        items: [
            'Wireless headphones (for the hard of hearing and older persons).',
            'Dimmers (remote control for lighting).',
            'Radio extenders for electronic sensors, remote controls for garage gates, blinds etc.',
        ],
    },
    {
        icon: HeartPulse,
        title: 'Medical devices',
        items: ['Pressure and pulse meters.'],
    },
];

const highlights = [
    'More than 20 years of experience',
    'More than 50 successfully completed projects',
    'Experienced specialists',
    'Guaranteed quality',
    'Short turn-around times',
    'Cost effective',
];

const offerings = [
    'The full cycle of electronic devices development (from concept to finished product).',
    'Provision of individual phases of development.',
    'Completion of uncompleted projects which have already been started.',
];
</script>

<template>
    <Head title="Projects" />

    <PageHero
        eyebrow="Projects"
        title="Projects we have developed"
        description="Over more than twenty years we have developed and taken part in the development of more than 50 projects."
    />

    <!-- Categories -->
    <section class="py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-6 md:grid-cols-2">
                <div
                    v-for="category in categories"
                    :key="category.title"
                    class="rounded-xl border border-border bg-card p-8 shadow-sm"
                >
                    <div class="flex items-center gap-4">
                        <div
                            class="flex size-12 items-center justify-center rounded-xl bg-primary/10 text-primary"
                        >
                            <component :is="category.icon" class="size-6" />
                        </div>
                        <h2 class="text-xl font-semibold">
                            {{ category.title }}
                        </h2>
                    </div>
                    <ul class="mt-6 space-y-3">
                        <li
                            v-for="(item, index) in category.items"
                            :key="index"
                            class="flex items-start gap-3 leading-relaxed text-muted-foreground"
                        >
                            <Cpu class="mt-1 size-4 shrink-0 text-primary" />
                            <span>{{ item }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Highlights -->
    <section class="border-t border-border/60 bg-muted/30 py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-2 lg:gap-16">
                <div>
                    <p
                        class="text-sm font-semibold tracking-wider text-primary uppercase"
                    >
                        Dimgent Technologies is
                    </p>
                    <h2
                        class="mt-2 text-3xl font-bold tracking-tight text-foreground sm:text-4xl"
                    >
                        Experience you can rely on
                    </h2>
                    <ul class="mt-8 grid gap-3 sm:grid-cols-2">
                        <li
                            v-for="highlight in highlights"
                            :key="highlight"
                            class="flex items-center gap-3 rounded-xl border border-border bg-card p-4 shadow-sm"
                        >
                            <Gauge class="size-5 shrink-0 text-primary" />
                            <span class="text-sm font-medium">{{
                                highlight
                            }}</span>
                        </li>
                    </ul>
                </div>
                <div
                    class="rounded-2xl border border-border bg-card p-8 shadow-sm lg:p-12"
                >
                    <h2 class="text-xl font-semibold">We can provide</h2>
                    <ul class="mt-6 space-y-4">
                        <li
                            v-for="offering in offerings"
                            :key="offering"
                            class="flex items-start gap-3 leading-relaxed text-muted-foreground"
                        >
                            <Radio class="mt-1 size-4 shrink-0 text-primary" />
                            <span>{{ offering }}</span>
                        </li>
                    </ul>
                    <p class="mt-6 leading-relaxed text-muted-foreground">
                        And more&hellip; We are happy to work on both large and
                        small projects, for big or small enterprises.
                    </p>
                    <div class="mt-8 flex flex-wrap gap-3">
                        <Button as-child>
                            <Link :href="services()">
                                Our services
                                <ArrowRight class="size-4" />
                            </Link>
                        </Button>
                        <Button as-child variant="outline">
                            <Link :href="contacts()">Contact us</Link>
                        </Button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
