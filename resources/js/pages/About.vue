<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import {
    ArrowRight,
    BadgeCheck,
    CheckCircle2,
    Cpu,
    HeartHandshake,
    Lightbulb,
    MapPin,
    Radio,
    ScanLine,
    Settings,
    Target,
} from '@lucide/vue';
import PageHero from '@/components/site/PageHero.vue';
import { Button } from '@/components/ui/button';
import { contacts } from '@/routes';

const experienceAreas = [
    'Devices and embedded systems using microcontrollers and microprocessors',
    'Analog electronic devices',
    'Digital electronic devices (logical systems, programmable logical matrices, embedded systems)',
    'Telemechanics (telemetry and remote controls) using infra-red and radio channels — Wi-Fi, Bluetooth, GSM and non-standard protocols',
    'Systems to digitize analog and speech signals',
    'Software for various microcontrollers',
    'Designs for printed circuit boards',
    'Signal monitors for three-phase power circuits',
    'Magnetic ferroprobe gauges (gradiometers) and electronic soil probes',
    'Robotics',
    'Automated systems to measure microchips and hardware devices',
];

const aims = [
    {
        icon: HeartHandshake,
        title: 'Client satisfaction',
        description:
            'We want our clients to be fully satisfied with the results of our work.',
    },
    {
        icon: Target,
        title: 'Exact results',
        description:
            'We work with our clients until the product is exactly the one they want it to be.',
    },
    {
        icon: Lightbulb,
        title: 'Better products',
        description:
            'We can also offer ideas for changes and improvements of the product being developed in order to make it even better.',
    },
];

const stats = [
    { value: '20+', label: 'Years of experience' },
    { value: '50+', label: 'Successfully completed projects' },
    {
        value: '3',
        label: 'Specialist roles: engineers, designers, programmers',
    },
];
</script>

<template>
    <Head title="About" />

    <PageHero
        eyebrow="About us"
        title="Dimgent Technologies"
        description="A development center in Minsk, Belarus — a group of specialists working in the sector of the development of electronic devices."
    />

    <!-- Story -->
    <section class="py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-2 lg:gap-16">
                <div>
                    <h2
                        class="text-3xl font-bold tracking-tight text-foreground"
                    >
                        Who we are
                    </h2>
                    <div
                        class="mt-6 space-y-4 leading-relaxed text-muted-foreground"
                    >
                        <p>
                            Dimgent Technologies is a group of specialists
                            working in the sector of the development of
                            electronic devices. Our company includes engineers,
                            designers and programmers.
                        </p>
                        <p>
                            Our specialists have been creating electronic
                            devices for more than twenty years. Over this time
                            we have developed and taken part in the development
                            of more than 50 projects.
                        </p>
                        <p>
                            We offer a comprehensive approach to the projects we
                            work on: both full-cycle electronic device
                            development (from concept to finished product) and
                            separate phases — developing the electric circuits
                            of a device, software, drawings of printed circuit
                            boards and so on.
                        </p>
                        <p>
                            We are happy to work on both large and small
                            projects, for big or small enterprises. We strive to
                            ensure the lowest cost of the products we develop by
                            careful selection of components, maintaining the
                            balance between cost and quality.
                        </p>
                    </div>
                    <div class="mt-8">
                        <Button as-child>
                            <Link :href="contacts()">
                                Work with us
                                <ArrowRight class="size-4" />
                            </Link>
                        </Button>
                    </div>
                </div>
                <div class="space-y-6">
                    <div
                        v-for="aim in aims"
                        :key="aim.title"
                        class="flex items-start gap-4 rounded-xl border border-border bg-card p-6 shadow-sm"
                    >
                        <div
                            class="flex size-11 shrink-0 items-center justify-center rounded-lg bg-primary/10 text-primary"
                        >
                            <component :is="aim.icon" class="size-5" />
                        </div>
                        <div>
                            <h3 class="font-semibold">{{ aim.title }}</h3>
                            <p
                                class="mt-1 text-sm leading-relaxed text-muted-foreground"
                            >
                                {{ aim.description }}
                            </p>
                        </div>
                    </div>
                    <div
                        class="flex items-center gap-3 rounded-xl border border-border bg-muted/30 p-6"
                    >
                        <MapPin class="size-5 shrink-0 text-primary" />
                        <p class="text-sm text-muted-foreground">
                            Development center: <strong>Minsk, Belarus</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Experience areas -->
    <section class="border-t border-border/60 bg-muted/30 py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl">
                <p
                    class="text-sm font-semibold tracking-wider text-primary uppercase"
                >
                    Expertise
                </p>
                <h2
                    class="mt-2 text-3xl font-bold tracking-tight text-foreground sm:text-4xl"
                >
                    Areas of experience
                </h2>
                <p class="mt-4 text-lg text-muted-foreground">
                    We have experience in various areas of electronic devices
                    development, software development and circuitry design.
                </p>
            </div>
            <ul class="mt-10 grid gap-3 sm:grid-cols-2">
                <li
                    v-for="area in experienceAreas"
                    :key="area"
                    class="flex items-start gap-3 rounded-xl border border-border bg-card p-4 shadow-sm"
                >
                    <CheckCircle2 class="mt-0.5 size-5 shrink-0 text-primary" />
                    <span class="text-sm leading-relaxed">{{ area }}</span>
                </li>
            </ul>
        </div>
    </section>

    <!-- Stats + reasons -->
    <section class="py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <dl class="grid gap-8 sm:grid-cols-3">
                <div
                    v-for="stat in stats"
                    :key="stat.label"
                    class="rounded-2xl border border-border bg-card p-8 text-center shadow-sm"
                >
                    <dd class="text-4xl font-bold tracking-tight text-primary">
                        {{ stat.value }}
                    </dd>
                    <dt class="mt-2 text-sm text-muted-foreground">
                        {{ stat.label }}
                    </dt>
                </div>
            </dl>
            <div
                class="mt-12 rounded-2xl border border-border bg-card p-8 shadow-sm lg:p-12"
            >
                <div class="grid gap-8 lg:grid-cols-2 lg:gap-16">
                    <div>
                        <h2 class="text-xl font-semibold">
                            The main reasons to choose us
                        </h2>
                        <p class="mt-3 leading-relaxed text-muted-foreground">
                            Cost-effectiveness, quick turn-around times and high
                            quality! We can provide the full cycle of electronic
                            devices development (from concept to finished
                            product), provision of individual phases of
                            development, and completion of uncompleted projects
                            which have already been started. And more&hellip;
                        </p>
                    </div>
                    <ul class="grid content-center gap-3 sm:grid-cols-2">
                        <li class="flex items-center gap-3">
                            <BadgeCheck class="size-5 shrink-0 text-primary" />
                            <span class="text-sm font-medium"
                                >More than 20 years of experience</span
                            >
                        </li>
                        <li class="flex items-center gap-3">
                            <BadgeCheck class="size-5 shrink-0 text-primary" />
                            <span class="text-sm font-medium"
                                >More than 50 successfully completed
                                projects</span
                            >
                        </li>
                        <li class="flex items-center gap-3">
                            <Cpu class="size-5 shrink-0 text-primary" />
                            <span class="text-sm font-medium"
                                >Experienced specialists</span
                            >
                        </li>
                        <li class="flex items-center gap-3">
                            <Settings class="size-5 shrink-0 text-primary" />
                            <span class="text-sm font-medium"
                                >Guaranteed quality</span
                            >
                        </li>
                        <li class="flex items-center gap-3">
                            <ScanLine class="size-5 shrink-0 text-primary" />
                            <span class="text-sm font-medium"
                                >Short turn-around times</span
                            >
                        </li>
                        <li class="flex items-center gap-3">
                            <Radio class="size-5 shrink-0 text-primary" />
                            <span class="text-sm font-medium"
                                >Cost effective</span
                            >
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</template>
