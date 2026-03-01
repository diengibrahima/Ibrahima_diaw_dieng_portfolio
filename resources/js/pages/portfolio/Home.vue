<template>
  <div>

    <!-- ── Hero ───────────────────────────────────────────── -->
    <section class="max-w-5xl mx-auto px-6 pt-28 pb-20 flex flex-col gap-7">

      <!-- Badge disponibilité -->
      <div class="inline-flex items-center gap-2.5 text-xs font-medium text-emerald-700 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-200 dark:border-emerald-800 px-3.5 py-2 rounded-full w-fit">
        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
        Disponible pour des missions freelance
      </div>

      <!-- Titre -->
      <h1 class="text-5xl md:text-7xl font-semibold tracking-tight leading-[1.05]">
        Ibrahima Diaw<br />
        <span class="text-neutral-300 dark:text-neutral-600">Développeur</span><br />
        <span class="text-neutral-300 dark:text-neutral-600">Fullstack</span>
      </h1>

      <!-- Description -->
      <p class="max-w-lg text-neutral-600 dark:text-neutral-400 text-base leading-relaxed">
        Je conçois et développe des applications web et mobiles modernes.
        Spécialisé en
        <span class="text-neutral-900 dark:text-neutral-100 font-medium">Laravel</span>,
        <span class="text-neutral-900 dark:text-neutral-100 font-medium">Vue.js</span> et
        <span class="text-neutral-900 dark:text-neutral-100 font-medium">Flutter</span>.
      </p>

      <!-- CTA -->
      <div class="flex flex-wrap items-center gap-3 pt-1">
        <Link
          href="/projects"
          class="px-5 py-2.5 bg-neutral-900 dark:bg-white text-white dark:text-neutral-900 rounded-full text-sm font-medium hover:bg-neutral-700 dark:hover:bg-neutral-200 transition-colors"
        >
          Voir mes projets
        </Link>
        <Link
          href="/contact"
          class="px-5 py-2.5 border border-neutral-300 dark:border-neutral-700 text-neutral-700 dark:text-neutral-300 rounded-full text-sm font-medium hover:bg-neutral-100 dark:hover:bg-neutral-800/60 hover:border-neutral-400 transition-all"
        >
          Me contacter
        </Link>
        <a
          href="/cv/download"
          class="px-5 py-2.5 text-neutral-500 dark:text-neutral-400 text-sm font-medium hover:text-neutral-900 dark:hover:text-neutral-100 transition-colors"
        >
          CV ↓
        </a>
      </div>
    </section>

    <!-- ── Séparateur ─────────────────────────────────────── -->
    <Divider />

    <!-- ── Stack technique ───────────────────────────────── -->
    <section class="max-w-5xl mx-auto px-6 py-14">
      <p class="text-xs text-neutral-400 uppercase tracking-widest mb-8">Stack</p>
      <div class="flex flex-wrap gap-2">
        <span
          v-for="tech in stack"
          :key="tech"
          class="px-3.5 py-1.5 text-sm border border-neutral-200 dark:border-neutral-800 bg-neutral-50 dark:bg-neutral-900 text-neutral-700 dark:text-neutral-300 rounded-lg hover:border-neutral-400 dark:hover:border-neutral-600 hover:bg-white dark:hover:bg-neutral-800 transition-all cursor-default"
        >
          {{ tech }}
        </span>
      </div>
    </section>

    <!-- ── Séparateur ─────────────────────────────────────── -->
    <Divider />

    <!-- ── À propos ───────────────────────────────────────── -->
    <section class="max-w-5xl mx-auto px-6 py-14 grid md:grid-cols-2 gap-14 items-start">
      <div>
        <p class="text-xs text-neutral-400 uppercase tracking-widest mb-6">À propos</p>
        <h2 class="text-2xl font-semibold tracking-tight text-neutral-900 dark:text-neutral-100 mb-5 leading-snug">
          Passionné par la création<br />de produits utiles
        </h2>
        <p class="text-neutral-600 dark:text-neutral-400 leading-relaxed mb-4 text-sm">
          Développeur fullstack avec une solide expérience en Laravel et Vue.js,
          je construis des applications robustes, performantes et maintenables.
        </p>
        <p class="text-neutral-600 dark:text-neutral-400 leading-relaxed text-sm">
          J'aime aussi le développement mobile avec Flutter et je m'appuie sur
          PostgreSQL et MySQL pour concevoir des bases de données solides.
        </p>

        <Link
          href="/contact"
          class="inline-flex items-center gap-2 mt-8 text-sm font-medium text-neutral-900 dark:text-neutral-100 hover:gap-3 transition-all"
        >
          Travaillons ensemble →
        </Link>
      </div>

      <!-- Stats -->
      <div class="grid grid-cols-2 gap-3">
        <div
          v-for="stat in stats"
          :key="stat.label"
          class="p-6 bg-neutral-50 dark:bg-neutral-900 border border-neutral-200 dark:border-neutral-800 rounded-2xl hover:border-neutral-300 dark:hover:border-neutral-700 transition-colors"
        >
          <p class="text-3xl font-semibold tracking-tight text-neutral-900 dark:text-neutral-100">{{ stat.value }}</p>
          <p class="text-xs text-neutral-500 dark:text-neutral-400 mt-2 leading-snug">{{ stat.label }}</p>
        </div>
      </div>
    </section>

    <!-- ── Séparateur ─────────────────────────────────────── -->
    <Divider />

    <!-- ── Projets récents ────────────────────────────────── -->
    <section class="max-w-5xl mx-auto px-6 py-14">
      <div class="flex items-center justify-between mb-10">
        <p class="text-xs text-neutral-400 uppercase tracking-widest">Projets récents</p>
        <Link
          href="/projects"
          class="text-sm text-neutral-500 hover:text-neutral-900 dark:hover:text-neutral-100 transition-colors flex items-center gap-1 group"
        >
          Voir tout
          <span class="group-hover:translate-x-0.5 transition-transform inline-block">→</span>
        </Link>
      </div>

      <div class="grid md:grid-cols-3 gap-4">
        <Link
          v-for="project in featuredProjects"
          :key="project.title"
          href="/projects"
          class="group p-6 bg-neutral-50 dark:bg-neutral-900 border border-neutral-200 dark:border-neutral-800 rounded-2xl hover:border-neutral-300 dark:hover:border-neutral-700 hover:bg-white dark:hover:bg-neutral-800/60 transition-all"
        >
          <!-- Top -->
          <div class="flex items-start justify-between mb-5">
            <div class="w-10 h-10 bg-white dark:bg-neutral-800 border border-neutral-200 dark:border-neutral-700 rounded-xl flex items-center justify-center text-lg shadow-sm">
              {{ project.emoji }}
            </div>
            <span class="text-xs text-neutral-400 dark:text-neutral-500 border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 px-2.5 py-1 rounded-full">
              {{ project.type }}
            </span>
          </div>

          <!-- Contenu -->
          <h3 class="font-semibold text-neutral-900 dark:text-neutral-100 mb-2 text-sm">{{ project.title }}</h3>
          <p class="text-xs text-neutral-500 dark:text-neutral-400 leading-relaxed mb-4">{{ project.description }}</p>

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
    <section class="max-w-5xl mx-auto px-6 py-20 text-center">
      <p class="text-xs text-neutral-400 uppercase tracking-widest mb-5">Contact</p>
      <h2 class="text-3xl md:text-4xl font-semibold tracking-tight text-neutral-900 dark:text-neutral-100 mb-4">
        Un projet en tête ?
      </h2>
      <p class="text-neutral-600 dark:text-neutral-400 mb-8 max-w-sm mx-auto text-sm leading-relaxed">
        Je suis disponible pour des missions freelance et des opportunités fullstack.
      </p>
      <Link
        href="/contact"
        class="inline-flex items-center gap-2 px-7 py-3 bg-neutral-900 dark:bg-white text-white dark:text-neutral-900 rounded-full text-sm font-medium hover:bg-neutral-700 dark:hover:bg-neutral-200 transition-colors"
      >
        Démarrons une conversation →
      </Link>
    </section>

  </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import PortfolioLayout from '@/layouts/PortfolioLayout.vue'

defineOptions({ layout: PortfolioLayout })

// ── Composant séparateur local ─────────────────────────────
const Divider = {
  template: `<div class="max-w-5xl mx-auto px-6"><div class="border-t border-neutral-100 dark:border-neutral-800"></div></div>`
}

// ── Stack ──────────────────────────────────────────────────
const stack = [
  'Laravel', 'PHP', 'Vue.js', 'TypeScript',
  'Flutter', 'Dart', 'MySQL', 'PostgreSQL',
  'Inertia.js', 'Tailwind CSS', 'REST API', 'Git',
]

// ── Stats ──────────────────────────────────────────────────
const stats = [
  { value: '3+',  label: 'Années d\'expérience' },
  { value: '20+', label: 'Projets réalisés'      },
  { value: '10+', label: 'Clients satisfaits'    },
  { value: '∞',   label: 'Passion du code'       },
]

// ── Projets mis en avant ───────────────────────────────────
const featuredProjects = [
  {
    emoji: '🛒',
    type: 'Web',
    title: 'E-commerce Platform',
    description: 'Application complète de vente en ligne avec gestion des stocks et paiements.',
    tags: ['Laravel', 'Vue.js', 'MySQL'],
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
    description: 'Tableau de bord d\'analyse de données avec graphiques interactifs.',
    tags: ['Vue.js', 'PostgreSQL', 'Laravel'],
  },
]
</script>