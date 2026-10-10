<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { Mail, MapPin } from '@lucide/vue';
import { about, contacts, home, products, projects, services } from '@/routes';

const sitemap = [
    { title: 'Home', href: home() },
    { title: 'Products', href: products() },
    { title: 'Services', href: services() },
    { title: 'Projects', href: projects() },
    { title: 'About', href: about() },
    { title: 'Contacts', href: contacts() },
];
</script>

<template>
    <footer class="border-t border-border/60 bg-muted/30">
        <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
            <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-4">
                <div>
                    <Link :href="home()" class="flex items-center">
                        <span
                            class="flex items-center rounded-md bg-slate-900 px-3 py-1.5 dark:bg-slate-800"
                        >
                            <img
                                src="/images/logo.png"
                                alt="Dimgent Technologies"
                                class="h-5 w-auto"
                            />
                        </span>
                    </Link>
                    <p
                        class="mt-4 text-sm leading-relaxed text-muted-foreground"
                    >
                        A group of specialists working in the sector of
                        electronic devices development. Development center:
                        Minsk, Belarus.
                    </p>
                </div>
                <div>
                    <h3 class="text-sm font-semibold">Sitemap</h3>
                    <ul class="mt-4 space-y-2">
                        <li v-for="item in sitemap" :key="item.title">
                            <Link
                                :href="item.href"
                                class="text-sm text-muted-foreground transition-colors hover:text-foreground"
                            >
                                {{ item.title }}
                            </Link>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold">Products</h3>
                    <ul class="mt-4 space-y-2">
                        <li>
                            <Link
                                :href="products()"
                                class="text-sm text-muted-foreground transition-colors hover:text-foreground"
                            >
                                Garand 101 magnetometer-gradiometer
                            </Link>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold">Contacts</h3>
                    <ul class="mt-4 space-y-3">
                        <li
                            class="flex items-center gap-2 text-sm text-muted-foreground"
                        >
                            <Mail class="size-4 shrink-0" />
                            <a
                                href="mailto:info@dimgent.com"
                                class="transition-colors hover:text-foreground"
                            >
                                info@dimgent.com
                            </a>
                        </li>
                        <li
                            class="flex items-center gap-2 text-sm text-muted-foreground"
                        >
                            <MapPin class="size-4 shrink-0" />
                            Minsk, Belarus
                        </li>
                    </ul>
                </div>
            </div>
            <div
                class="mt-10 flex flex-col items-center justify-between gap-4 border-t border-border/60 pt-6 sm:flex-row"
            >
                <p class="text-sm text-muted-foreground">
                    &copy; {{ new Date().getFullYear() }} Dimgent Technologies.
                    All rights reserved.
                </p>
                <p class="text-sm text-muted-foreground">
                    Electronics development &mdash; Minsk, Belarus
                </p>
            </div>
        </div>
    </footer>
</template>
