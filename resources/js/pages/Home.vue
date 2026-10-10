<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import {
    ArrowRight,
    CircuitBoard,
    Cpu,
    FileCode2,
    Layers,
    MapPin,
    PenTool,
    Wrench,
} from '@lucide/vue';
import { Button } from '@/components/ui/button';
import { contacts, products, services } from '@/routes';

const stats = [
    { value: '20+', label: 'Years of experience' },
    { value: '50+', label: 'Successfully completed projects' },
    { value: '100%', label: 'Success rate in product design' },
    { value: '2', label: 'Ways to work with us: full-cycle or partial' },
];

const serviceAreas = [
    {
        icon: FileCode2,
        title: 'Specification',
        description:
            'Preparation and approval of technical specifications for the electronic device you need.',
    },
    {
        icon: CircuitBoard,
        title: 'Electric circuits',
        description:
            'Development of electric circuits for your device, from analog to digital systems.',
    },
    {
        icon: Cpu,
        title: 'Software',
        description:
            'Software development for microcontrollers, embedded systems and user interfaces.',
    },
    {
        icon: Layers,
        title: 'PCB layouts',
        description:
            'Development of printed circuit board drawings ready for production.',
    },
    {
        icon: PenTool,
        title: 'Casing design',
        description:
            'Structural plans and mechanical design of product housings.',
    },
    {
        icon: Wrench,
        title: 'Prototyping',
        description:
            'Production of test models: assembly, fitting, programming and debugging.',
    },
];
</script>

<template>
    <Head title="Home" />

    <!-- Hero -->
    <section class="relative overflow-hidden">
        <div
            class="mx-auto grid max-w-7xl items-center gap-12 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:px-8 lg:py-24"
        >
            <div>
                <span
                    class="inline-flex items-center gap-2 rounded-full border border-border bg-muted/50 px-3 py-1 text-xs font-medium text-muted-foreground"
                >
                    <MapPin class="size-3.5" />
                    Electronics development center &mdash; Minsk, Belarus
                </span>
                <h1
                    class="mt-6 text-4xl font-bold tracking-tight text-foreground sm:text-5xl lg:text-6xl"
                >
                    Custom electronics development,
                    <span class="text-primary"
                        >from concept to finished product</span
                    >
                </h1>
                <p
                    class="mt-6 max-w-xl text-lg leading-relaxed text-muted-foreground"
                >
                    Dimgent Technologies is a group of specialists working in
                    the development of electronic devices. We offer full-cycle
                    development of electronic devices or individual specialized
                    phases &mdash; circuit development, software, PCB drawings
                    and more.
                </p>
                <div class="mt-8 flex flex-wrap items-center gap-3">
                    <Button as-child size="lg">
                        <Link :href="services()">
                            Explore our services
                            <ArrowRight class="size-4" />
                        </Link>
                    </Button>
                    <Button as-child variant="outline" size="lg">
                        <Link :href="contacts()">Contact us</Link>
                    </Button>
                </div>
            </div>
            <div class="relative">
                <div
                    class="overflow-hidden rounded-2xl border border-border bg-muted shadow-xl"
                >
                    <img
                        src="/images/garand101/main.jpg"
                        alt="Garand 101 magnetometer-gradiometer"
                        class="aspect-square w-full object-cover"
                    />
                </div>
                <Link
                    :href="products()"
                    class="absolute right-4 bottom-4 flex items-center gap-3 rounded-xl border border-border bg-background/95 p-4 shadow-lg backdrop-blur transition-shadow hover:shadow-xl"
                >
                    <div
                        class="flex size-10 items-center justify-center rounded-lg bg-primary/10 text-primary"
                    >
                        <ArrowRight class="size-5" />
                    </div>
                    <div>
                        <p class="text-sm font-semibold">Garand 101</p>
                        <p class="text-xs text-muted-foreground">
                            High-resolution fluxgate magnetometer
                        </p>
                    </div>
                </Link>
            </div>
        </div>
    </section>

    <!-- Stats -->
    <section class="border-y border-border/60 bg-muted/30">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <dl class="grid grid-cols-2 gap-8 py-12 lg:grid-cols-4 lg:py-16">
                <div
                    v-for="stat in stats"
                    :key="stat.label"
                    class="text-center"
                >
                    <dt class="order-2 mt-2 text-sm text-muted-foreground">
                        {{ stat.label }}
                    </dt>
                    <dd
                        class="order-1 text-4xl font-bold tracking-tight text-primary"
                    >
                        {{ stat.value }}
                    </dd>
                </div>
            </dl>
        </div>
    </section>

    <!-- Services overview -->
    <section class="py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl">
                <p
                    class="text-sm font-semibold tracking-wider text-primary uppercase"
                >
                    What we do
                </p>
                <h2
                    class="mt-2 text-3xl font-bold tracking-tight text-foreground sm:text-4xl"
                >
                    Key development areas
                </h2>
                <p class="mt-4 text-lg text-muted-foreground">
                    Our engineers, designers and programmers cover every stage
                    of electronic device development.
                </p>
            </div>
            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <div
                    v-for="area in serviceAreas"
                    :key="area.title"
                    class="rounded-xl border border-border bg-card p-6 shadow-sm transition-shadow hover:shadow-md"
                >
                    <div
                        class="flex size-11 items-center justify-center rounded-lg bg-primary/10 text-primary"
                    >
                        <component :is="area.icon" class="size-5" />
                    </div>
                    <h3 class="mt-4 text-lg font-semibold">{{ area.title }}</h3>
                    <p
                        class="mt-2 text-sm leading-relaxed text-muted-foreground"
                    >
                        {{ area.description }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Product showcase -->
    <section class="border-t border-border/60 bg-muted/30 py-16 lg:py-24">
        <div
            class="mx-auto grid max-w-7xl items-center gap-12 px-4 sm:px-6 lg:grid-cols-2 lg:px-8"
        >
            <div
                class="overflow-hidden rounded-2xl border border-border bg-background shadow-lg"
            >
                <img
                    src="/images/garand101/main.jpg"
                    alt="Garand 101 magnetometer-gradiometer"
                    class="aspect-square w-full object-cover"
                />
            </div>
            <div>
                <p
                    class="text-sm font-semibold tracking-wider text-primary uppercase"
                >
                    Featured product
                </p>
                <h2
                    class="mt-2 text-3xl font-bold tracking-tight text-foreground sm:text-4xl"
                >
                    Garand 101 magnetometer-gradiometer
                </h2>
                <p class="mt-4 text-lg leading-relaxed text-muted-foreground">
                    A high-resolution fluxgate magnetometer designed to measure
                    disruptions in the Earth's magnetic field caused by
                    ferromagnetic objects. Lightweight, user-friendly, reliable
                    and low-cost &mdash; designed for one-person operation.
                </p>
                <p
                    class="mt-4 text-base font-medium text-muted-foreground italic"
                >
                    &ldquo;Magnetic detection can be easy and convenient!&rdquo;
                </p>
                <div class="mt-8">
                    <Button as-child size="lg">
                        <Link :href="products()">
                            View Garand 101
                            <ArrowRight class="size-4" />
                        </Link>
                    </Button>
                </div>
            </div>
        </div>
    </section>

    <!-- Approach -->
    <section class="py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl">
                <p
                    class="text-sm font-semibold tracking-wider text-primary uppercase"
                >
                    How we work
                </p>
                <h2
                    class="mt-2 text-3xl font-bold tracking-tight text-foreground sm:text-4xl"
                >
                    A comprehensive approach to every project
                </h2>
            </div>
            <div class="mt-12 grid gap-6 lg:grid-cols-2">
                <div
                    class="rounded-xl border border-border bg-card p-8 shadow-sm"
                >
                    <h3 class="text-xl font-semibold">
                        Full-cycle development
                    </h3>
                    <p class="mt-3 leading-relaxed text-muted-foreground">
                        From concept to finished product: specification,
                        circuits, software, PCB drawings, casing design,
                        prototyping, certification preparation and technical
                        support.
                    </p>
                </div>
                <div
                    class="rounded-xl border border-border bg-card p-8 shadow-sm"
                >
                    <h3 class="text-xl font-semibold">Individual phases</h3>
                    <p class="mt-3 leading-relaxed text-muted-foreground">
                        If required, we can complete separate phases only:
                        developing the electric circuits of a device, software,
                        drawings of printed circuit boards and so on.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="border-t border-border/60 py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div
                class="flex flex-col items-start justify-between gap-6 rounded-2xl bg-primary px-8 py-12 text-primary-foreground shadow-lg lg:flex-row lg:items-center lg:px-16 lg:py-16"
            >
                <div>
                    <h2 class="text-3xl font-bold tracking-tight">
                        Have a project in mind?
                    </h2>
                    <p class="mt-2 max-w-xl text-primary-foreground/80">
                        Tell us about your device &mdash; we will help you bring
                        it to life, from the first sketch to the finished
                        product.
                    </p>
                </div>
                <Button as-child size="lg" variant="secondary" class="shrink-0">
                    <Link :href="contacts()">Get in touch</Link>
                </Button>
            </div>
        </div>
    </section>
</template>
