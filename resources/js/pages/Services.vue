<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import {
    ArrowRight,
    Cog,
    Gauge,
    LifeBuoy,
    PiggyBank,
    Rocket,
    ShieldCheck,
    Trophy,
} from '@lucide/vue';
import PageHero from '@/components/site/PageHero.vue';
import { Button } from '@/components/ui/button';
import { contacts } from '@/routes';

const phases = [
    'Preparation and approval of technical specifications for an electronic device you need',
    'Selection of electronic components, mechanical parts and bundles for the device',
    'Development of electric circuits for a device',
    'Software development',
    'Development of printed circuit board drawings',
    'Structural plans and design of product casing',
    'Making mock-ups of individual assemblies needed to complete the intended task',
    'Developing the final versions of technical and user documentation, product software and man-machine interface design',
    'Production of test models (assembly, fitting, programming and debugging) and subsequent testing',
    'Preparation for certification and technical support',
];

const advantages = [
    {
        icon: PiggyBank,
        title: 'Cost',
        description:
            'One reason for choosing us is our cost-effective, high-quality services.',
    },
    {
        icon: Rocket,
        title: 'Speed',
        description:
            'We take projects only up to our handling capacity, so we can concentrate on each project.',
    },
    {
        icon: Gauge,
        title: 'Efficiency',
        description:
            'A number of standard design elements can be reused across products, which helps keep costs down.',
    },
    {
        icon: LifeBuoy,
        title: 'Support',
        description:
            'All of our projects are offered ongoing support from our team of developers.',
    },
    {
        icon: ShieldCheck,
        title: 'Reliability',
        description:
            'All products are assembled in our laboratory and tested before delivery — this is how we guarantee high quality.',
    },
    {
        icon: Cog,
        title: 'Experience',
        description:
            'Our specialists have been creating electronic devices for more than twenty years.',
    },
    {
        icon: Trophy,
        title: 'Guaranteed success',
        description:
            'Thanks to our extensive experience we have a 100% success rate in the design of our products.',
    },
];
</script>

<template>
    <Head title="Services" />

    <PageHero
        eyebrow="Services"
        title="Customized development of electronic devices"
        description="We offer a full cycle development of electronic devices (from mock-up to finished product) or, if required, can just complete individual phases."
    />

    <!-- Development phases -->
    <section class="py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-2 lg:gap-16">
                <div>
                    <h2
                        class="text-3xl font-bold tracking-tight text-foreground"
                    >
                        Development phases
                    </h2>
                    <p class="mt-4 leading-relaxed text-muted-foreground">
                        Every project follows a proven sequence of phases. Some
                        development phases may be missed out as required, and
                        additional phases may also be included if required.
                    </p>
                    <div class="mt-8">
                        <Button as-child>
                            <Link :href="contacts()">
                                Request a quote
                                <ArrowRight class="size-4" />
                            </Link>
                        </Button>
                    </div>
                </div>
                <ol class="space-y-3">
                    <li
                        v-for="(phase, index) in phases"
                        :key="index"
                        class="flex items-start gap-4 rounded-xl border border-border bg-card p-4 shadow-sm"
                    >
                        <span
                            class="flex size-8 shrink-0 items-center justify-center rounded-lg bg-primary/10 text-sm font-semibold text-primary"
                        >
                            {{ index + 1 }}
                        </span>
                        <span class="leading-relaxed">{{ phase }}</span>
                    </li>
                </ol>
            </div>
        </div>
    </section>

    <!-- Advantages -->
    <section class="border-t border-border/60 bg-muted/30 py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl">
                <p
                    class="text-sm font-semibold tracking-wider text-primary uppercase"
                >
                    Advantages
                </p>
                <h2
                    class="mt-2 text-3xl font-bold tracking-tight text-foreground sm:text-4xl"
                >
                    Why order from Dimgent Technologies
                </h2>
            </div>
            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <div
                    v-for="advantage in advantages"
                    :key="advantage.title"
                    class="rounded-xl border border-border bg-card p-6 shadow-sm"
                >
                    <div
                        class="flex size-11 items-center justify-center rounded-lg bg-primary/10 text-primary"
                    >
                        <component :is="advantage.icon" class="size-5" />
                    </div>
                    <h3 class="mt-4 text-lg font-semibold">
                        {{ advantage.title }}
                    </h3>
                    <p
                        class="mt-2 text-sm leading-relaxed text-muted-foreground"
                    >
                        {{ advantage.description }}
                    </p>
                </div>
            </div>
            <div
                class="mt-6 rounded-xl border border-border bg-card p-6 shadow-sm lg:p-8"
            >
                <h3 class="text-lg font-semibold">Our aim</h3>
                <p class="mt-2 leading-relaxed text-muted-foreground">
                    We want our clients to be fully satisfied with the results
                    of our work. We work with our clients until the product is
                    exactly the one they want it to be, and we also offer ideas
                    for changes and improvements in order to improve its
                    functionality and efficiency.
                </p>
            </div>
        </div>
    </section>

    <!-- Distance -->
    <section class="py-16 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
                <div>
                    <h2
                        class="text-3xl font-bold tracking-tight text-foreground"
                    >
                        Is distance a problem? No, of course not!
                    </h2>
                    <p class="mt-4 leading-relaxed text-muted-foreground">
                        The majority of our clients from other countries wish to
                        outsource device development to keep costs down. Once
                        they have received the finished product and evaluated
                        its quality, they often make more orders for the
                        development of other electronic devices.
                    </p>
                    <p class="mt-4 leading-relaxed text-muted-foreground">
                        We can assure you that distance is not a problem, since
                        the Internet brings us nearer than ever before.
                        Furthermore, we will keep you updated on the progress of
                        the work with photos and video if you wish.
                    </p>
                </div>
                <div
                    class="rounded-2xl border border-border bg-muted/30 p-8 lg:p-12"
                >
                    <h3 class="text-xl font-semibold">We also offer</h3>
                    <ul class="mt-4 space-y-3">
                        <li class="flex items-start gap-3">
                            <ShieldCheck
                                class="mt-0.5 size-5 shrink-0 text-primary"
                            />
                            <span class="leading-relaxed"
                                >Industrial controllers and microcontrollers
                                programming.</span
                            >
                        </li>
                        <li class="flex items-start gap-3">
                            <ShieldCheck
                                class="mt-0.5 size-5 shrink-0 text-primary"
                            />
                            <span class="leading-relaxed"
                                >The full cycle of electronic devices
                                development (from concept to finished
                                product).</span
                            >
                        </li>
                        <li class="flex items-start gap-3">
                            <ShieldCheck
                                class="mt-0.5 size-5 shrink-0 text-primary"
                            />
                            <span class="leading-relaxed"
                                >Provision of individual phases of
                                development.</span
                            >
                        </li>
                        <li class="flex items-start gap-3">
                            <ShieldCheck
                                class="mt-0.5 size-5 shrink-0 text-primary"
                            />
                            <span class="leading-relaxed"
                                >Completion of uncompleted projects which have
                                already been started.</span
                            >
                        </li>
                    </ul>
                    <p class="mt-6 text-sm text-muted-foreground">
                        We ensure that our electronic devices are cost effective
                        by using the minimum possible number of components. We
                        carefully select the components, maintaining the balance
                        between cost-effectiveness and high quality.
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>
