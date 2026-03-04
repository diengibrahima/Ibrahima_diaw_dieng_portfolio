<template>
    <div>
        <!-- ── Hero ───────────────────────────────────────────── -->
        <section class="mx-auto flex max-w-5xl flex-col gap-7 px-6 pt-28 pb-20">
            <!-- Badge disponibilité -->
            <div
                class="inline-flex w-fit items-center gap-2.5 rounded-full border border-emerald-200 bg-emerald-50 px-3.5 py-2 text-xs font-medium text-emerald-700 dark:border-emerald-800 dark:bg-emerald-950/40 dark:text-emerald-400"
            >
                <span
                    class="h-1.5 w-1.5 animate-pulse rounded-full bg-emerald-500"
                ></span>
                Disponible pour des missions freelance
            </div>

            <!-- Titre -->
            <h1
                class="text-5xl leading-[1.05] font-semibold tracking-tight md:text-7xl"
            >
                Ibrahima Diaw DIENG
            </h1>

            <p class="mt-1 max-w-3xl text-xl text-neutral-400 md:text-2xl">
                Fullstack Developer, Data Scientist & AI Engineer
            </p>

            <!-- Description -->
            <p
                class="max-w-lg text-base leading-relaxed text-neutral-600 dark:text-neutral-400"
            >
                Je conçois et développe des applications web Spécialisé en
                <span class="font-medium text-neutral-900 dark:text-neutral-100"
                    >Laravel</span
                >,
                <span class="font-medium text-neutral-900 dark:text-neutral-100"
                    >React.js</span
                >,
                <span class="font-medium text-neutral-900 dark:text-neutral-100"
                    >Livewire</span
                >
                et

                <span class="font-medium text-neutral-900 dark:text-neutral-100"
                    >Python</span
                >.
            </p>

            <!-- CTA -->
            <div class="flex flex-wrap items-center gap-3 pt-1">
                <Link
                    href="/projects"
                    class="rounded-full bg-neutral-900 px-5 py-2.5 text-sm font-medium text-white transition-colors hover:bg-neutral-700 dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-200"
                >
                    Voir mes projets
                </Link>
                <Link
                    href="/contact"
                    class="rounded-full border border-neutral-300 px-5 py-2.5 text-sm font-medium text-neutral-700 transition-all hover:border-neutral-400 hover:bg-neutral-100 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800/60"
                >
                    Me contacter
                </Link>
                <a
                    href="/cv/download"
                    class="px-5 py-2.5 text-sm font-medium text-neutral-500 transition-colors hover:text-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-100"
                >
                    CV ↓
                </a>
            </div>
        </section>

        <!-- ── Séparateur ─────────────────────────────────────── -->
        <Divider />

        <!-- ── Stack technique ───────────────────────────────── -->
        <section class="mx-auto max-w-5xl px-6 py-14">
            <p class="mb-8 text-xs tracking-widest text-neutral-400 uppercase">
                Stack
            </p>
            <div class="flex flex-wrap gap-2">
                <span
                    v-for="tech in stack"
                    :key="tech"
                    class="cursor-default rounded-lg border border-neutral-200 bg-neutral-50 px-3.5 py-1.5 text-sm text-neutral-700 transition-all hover:border-neutral-400 hover:bg-white dark:border-neutral-800 dark:bg-neutral-900 dark:text-neutral-300 dark:hover:border-neutral-600 dark:hover:bg-neutral-800"
                >
                    {{ tech }}
                </span>
            </div>
        </section>

        <!-- ── Séparateur ─────────────────────────────────────── -->
        <Divider />

        <!-- ── À propos ───────────────────────────────────────── -->
        <section
            class="mx-auto grid max-w-5xl items-start gap-14 px-6 py-14 md:grid-cols-2"
        >
            <div>
                <p
                    class="mb-6 text-xs tracking-widest text-neutral-400 uppercase"
                >
                    À propos
                </p>
                <h2
                    class="mb-5 text-2xl leading-snug font-semibold tracking-tight text-neutral-900 dark:text-neutral-100"
                >
                    Passionné par la création<br />de produits utiles
                </h2>
                <p
                    class="mb-4 text-sm leading-relaxed text-neutral-600 dark:text-neutral-400"
                >
                    Développeur fullstack avec une solide expérience en Laravel
                    et Vue.js, je construis des applications robustes,
                    performantes et maintenables.
                </p>
                <p
                    class="text-sm leading-relaxed text-neutral-600 dark:text-neutral-400"
                >
                    J'aime aussi le développement mobile avec Flutter et je
                    m'appuie sur PostgreSQL et MySQL pour concevoir des bases de
                    données solides.
                </p>

                <Link
                    href="/contact"
                    class="mt-8 inline-flex items-center gap-2 text-sm font-medium text-neutral-900 transition-all hover:gap-3 dark:text-neutral-100"
                >
                    Travaillons ensemble →
                </Link>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-2 gap-3">
                <div
                    v-for="stat in stats"
                    :key="stat.label"
                    class="rounded-2xl border border-neutral-200 bg-neutral-50 p-6 transition-colors hover:border-neutral-300 dark:border-neutral-800 dark:bg-neutral-900 dark:hover:border-neutral-700"
                >
                    <p
                        class="text-3xl font-semibold tracking-tight text-neutral-900 dark:text-neutral-100"
                    >
                        {{ stat.value }}
                    </p>
                    <p
                        class="mt-2 text-xs leading-snug text-neutral-500 dark:text-neutral-400"
                    >
                        {{ stat.label }}
                    </p>
                </div>
            </div>
        </section>

        <!-- ── Séparateur ─────────────────────────────────────── -->
        <Divider />

        <!-- ── Projets récents ────────────────────────────────── -->
        <section class="mx-auto max-w-5xl px-6 py-14">
            <div class="mb-10 flex items-center justify-between">
                <p class="text-xs tracking-widest text-neutral-400 uppercase">
                    Projets récents
                </p>
                <Link
                    href="/projects"
                    class="group flex items-center gap-1 text-sm text-neutral-500 transition-colors hover:text-neutral-900 dark:hover:text-neutral-100"
                >
                    Voir tout
                    <span
                        class="inline-block transition-transform group-hover:translate-x-0.5"
                        >→</span
                    >
                </Link>
            </div>

            <div class="grid gap-4 md:grid-cols-3">
                <Link
                    v-for="project in featuredProjects"
                    :key="project.title"
                    href="/projects"
                    class="group rounded-2xl border border-neutral-200 bg-neutral-50 p-6 transition-all hover:border-neutral-300 hover:bg-white dark:border-neutral-800 dark:bg-neutral-900 dark:hover:border-neutral-700 dark:hover:bg-neutral-800/60"
                >
                    <!-- Top -->
                    <div class="mb-5 flex items-start justify-between">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl border border-neutral-200 bg-white text-lg shadow-sm dark:border-neutral-700 dark:bg-neutral-800"
                        >
                            {{ project.emoji }}
                        </div>
                        <span
                            class="rounded-full border border-neutral-200 bg-white px-2.5 py-1 text-xs text-neutral-400 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-500"
                        >
                            {{ project.type }}
                        </span>
                    </div>

                    <!-- Contenu -->
                    <h3
                        class="mb-2 text-sm font-semibold text-neutral-900 dark:text-neutral-100"
                    >
                        {{ project.title }}
                    </h3>
                    <p
                        class="mb-4 text-xs leading-relaxed text-neutral-500 dark:text-neutral-400"
                    >
                        {{ project.description }}
                    </p>

                    <!-- Tags -->
                    <div class="flex flex-wrap gap-1.5">
                        <span
                            v-for="tag in project.tags"
                            :key="tag"
                            class="text-xs text-neutral-400 dark:text-neutral-500"
                        >
                            #{{ tag }}
                        </span>
                    </div>
                </Link>
            </div>
        </section>

        <!-- ── Séparateur ─────────────────────────────────────── -->
        <Divider />

        <!-- ── CTA Final ──────────────────────────────────────── -->
        <section class="mx-auto max-w-5xl px-6 py-20 text-center">
            <p class="mb-5 text-xs tracking-widest text-neutral-400 uppercase">
                Contact
            </p>
            <h2
                class="mb-4 text-3xl font-semibold tracking-tight text-neutral-900 md:text-4xl dark:text-neutral-100"
            >
                Un projet en tête ?
            </h2>
            <p
                class="mx-auto mb-8 max-w-sm text-sm leading-relaxed text-neutral-600 dark:text-neutral-400"
            >
                Je suis disponible pour des missions freelance et des
                opportunités fullstack.
            </p>
            <Link
                href="/contact"
                class="inline-flex items-center gap-2 rounded-full bg-neutral-900 px-7 py-3 text-sm font-medium text-white transition-colors hover:bg-neutral-700 dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-200"
            >
                Démarrons une conversation →
            </Link>
        </section>
    </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import PortfolioLayout from '@/layouts/PortfolioLayout.vue';

defineOptions({ layout: PortfolioLayout });

// ── Composant séparateur local ─────────────────────────────
const Divider = {
    template: `<div class="max-w-5xl mx-auto px-6"><div class="border-t border-neutral-100 dark:border-neutral-800"></div></div>`,
};

// ── Stack ──────────────────────────────────────────────────
const stack = [
    'Laravel',
    'PHP',
    'React.js',
    'Livewire',
    'TypeScript',
    'Flutter',
    'Dart',
    'MySQL',
    'PostgreSQL',
    'Inertia.js',
    'Tailwind CSS',
    'REST API',
    'Git',
];

// ── Stats ──────────────────────────────────────────────────
const stats = [
    { value: '3+', label: "Années d'expérience" },
    { value: '20+', label: 'Projets réalisés' },
    { value: '10+', label: 'Clients satisfaits' },
    { value: '∞', label: 'Passion du code' },
];

// ── Projets mis en avant ───────────────────────────────────
const featuredProjects = [
    {
        emoji: '🛒',
        type: 'Web',
        title: 'E-commerce Platform',
        description:
            'Application complète de vente en ligne avec gestion des stocks et paiements.',
        tags: ['Laravel', 'React.js', 'MySQL'],
    },
    {
        emoji: '📱',
        type: 'Mobile',
        title: 'App de livraison',
        description: 'Application mobile de suivi de livraison en temps réel.',
        tags: ['Flutter', 'Dart', 'API'],
    },
    {
        emoji: '📊',
        type: 'Web',
        title: 'Dashboard Analytics',
        description:
            "Tableau de bord d'analyse de données avec graphiques interactifs.",
        tags: ['React.js', 'PostgreSQL', 'Laravel'],
    },
];
</script>
