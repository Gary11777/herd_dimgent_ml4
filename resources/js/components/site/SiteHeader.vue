<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { Menu, Moon, Sun, X } from '@lucide/vue';
import { ref } from 'vue';
import { Button } from '@/components/ui/button';
import { useAppearance } from '@/composables/useAppearance';
import { useCurrentUrl } from '@/composables/useCurrentUrl';
import { about, contacts, home, products, projects, services } from '@/routes';

const navItems = [
    { title: 'Home', href: home() },
    { title: 'Products', href: products() },
    { title: 'Services', href: services() },
    { title: 'Projects', href: projects() },
    { title: 'About', href: about() },
    { title: 'Contacts', href: contacts() },
];

const { isCurrentUrl } = useCurrentUrl();
const { resolvedAppearance, updateAppearance } = useAppearance();

const mobileMenuOpen = ref(false);

const toggleAppearance = () => {
    updateAppearance(resolvedAppearance.value === 'dark' ? 'light' : 'dark');
};

const closeMobileMenu = () => {
    mobileMenuOpen.value = false;
};
</script>

<template>
    <header
        class="sticky top-0 z-50 border-b border-border/60 bg-background/80 backdrop-blur"
    >
        <div
            class="mx-auto flex h-16 max-w-7xl items-center justify-between gap-4 px-4 sm:px-6 lg:px-8"
        >
            <Link
                :href="home()"
                class="flex shrink-0 items-center"
                @click="closeMobileMenu"
            >
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

            <nav class="hidden items-center gap-1 md:flex">
                <Link
                    v-for="item in navItems"
                    :key="item.title"
                    :href="item.href"
                    class="rounded-md px-3 py-2 text-sm font-medium transition-colors"
                    :class="
                        isCurrentUrl(item.href)
                            ? 'bg-accent text-accent-foreground'
                            : 'text-muted-foreground hover:bg-accent/60 hover:text-foreground'
                    "
                >
                    {{ item.title }}
                </Link>
            </nav>

            <div class="flex items-center gap-2">
                <Button
                    variant="ghost"
                    size="icon"
                    aria-label="Toggle color theme"
                    @click="toggleAppearance"
                >
                    <Sun v-if="resolvedAppearance === 'dark'" class="size-5" />
                    <Moon v-else class="size-5" />
                </Button>
                <Button as-child class="hidden sm:inline-flex">
                    <Link :href="contacts()">Contact us</Link>
                </Button>
                <Button
                    variant="ghost"
                    size="icon"
                    class="md:hidden"
                    aria-label="Toggle navigation menu"
                    @click="mobileMenuOpen = !mobileMenuOpen"
                >
                    <X v-if="mobileMenuOpen" class="size-5" />
                    <Menu v-else class="size-5" />
                </Button>
            </div>
        </div>

        <div v-if="mobileMenuOpen" class="border-t border-border/60 md:hidden">
            <nav
                class="mx-auto flex max-w-7xl flex-col gap-1 px-4 py-4 sm:px-6 lg:px-8"
            >
                <Link
                    v-for="item in navItems"
                    :key="item.title"
                    :href="item.href"
                    class="rounded-md px-3 py-2 text-sm font-medium transition-colors"
                    :class="
                        isCurrentUrl(item.href)
                            ? 'bg-accent text-accent-foreground'
                            : 'text-muted-foreground hover:bg-accent/60 hover:text-foreground'
                    "
                    @click="closeMobileMenu"
                >
                    {{ item.title }}
                </Link>
                <Button as-child class="mt-2">
                    <Link :href="contacts()" @click="closeMobileMenu">
                        Contact us
                    </Link>
                </Button>
            </nav>
        </div>
    </header>
</template>
