<template>
  <div class="max-w-5xl mx-auto px-6 py-16">

    <!-- Header -->
    <div class="mb-16">
      <p class="text-xs text-neutral-400 uppercase tracking-widest mb-4">Projets</p>
      <h1 class="text-3xl md:text-4xl font-semibold tracking-tight mb-4">
        Ce que j'ai construit
      </h1>
      <p class="text-neutral-500 dark:text-neutral-400 max-w-xl">
        Une sélection de mes projets web et mobiles. Chaque projet est une occasion d'apprendre et de résoudre un problème concret.
      </p>
    </div>

    <!-- Filtres -->
    <div class="flex flex-wrap gap-2 mb-12">
      <button
        v-for="cat in categories"
        :key="cat"
        @click="activeCategory = cat"
        class="px-4 py-1.5 text-sm rounded-full border transition-all"
        :class="activeCategory === cat
          ? 'bg-neutral-900 dark:bg-neutral-100 text-white dark:text-neutral-900 border-neutral-900 dark:border-neutral-100'
          : 'border-neutral-200 dark:border-neutral-700 text-neutral-500 hover:border-neutral-400'"
      >
        {{ cat }}
      </button>
    </div>

    <!-- Grille projets -->
    <div class="grid md:grid-cols-2 gap-6">
      <div
        v-for="project in filteredProjects"
        :key="project.id"
        class="group p-6 border border-neutral-100 dark:border-neutral-800 rounded-2xl hover:border-neutral-300 dark:hover:border-neutral-600 transition-all"
      >
        <!-- Top -->
        <div class="flex items-start justify-between mb-4">
          <span class="text-3xl">{{ project.emoji }}</span>
          <span class="text-xs text-neutral-400 border border-neutral-100 dark:border-neutral-800 px-2 py-1 rounded-full">
            {{ project.category }}
          </span>
        </div>

        <!-- Contenu -->
        <h2 class="font-semibold text-lg mb-2">{{ project.title }}</h2>
        <p class="text-sm text-neutral-500 dark:text-neutral-400 leading-relaxed mb-4">
          {{ project.description }}
        </p>

        <!-- Tags -->
        <div class="flex flex-wrap gap-2 mb-6">
          <span
            v-for="tag in project.tags"
            :key="tag"
            class="text-xs px-2 py-1 bg-neutral-100 dark:bg-neutral-800 text-neutral-600 dark:text-neutral-300 rounded-md"
          >
            {{ tag }}
          </span>
        </div>

        <!-- Liens -->
        <div class="flex items-center gap-4 text-sm">
          <a
            v-if="project.github_url"
            :href="project.github_url"
            target="_blank"
            class="flex items-center gap-1.5 text-neutral-400 hover:text-neutral-900 dark:hover:text-neutral-100 transition-colors"
          >
            GitHub →
          </a>
          <a
            v-if="project.live_url"
            :href="project.live_url"
            target="_blank"
            class="flex items-center gap-1.5 text-neutral-400 hover:text-neutral-900 dark:hover:text-neutral-100 transition-colors"
          >
            Demo →
          </a>
        </div>
      </div>
    </div>

    <!-- Empty state -->
    <div v-if="filteredProjects.length === 0" class="text-center py-24 text-neutral-400">
      Aucun projet dans cette catégorie.
    </div>

  </div>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue'
import PortfolioLayout from '@/layouts/PortfolioLayout.vue'

defineOptions({ layout: PortfolioLayout })

// ── Props depuis Laravel ───────────────────────────────────
interface Project {
  id: number
  title: string
  slug: string
  description: string
  tags: string[]
  category: string
  emoji: string
  github_url: string | null
  live_url: string | null
  featured: boolean
}

const props = defineProps<{ projects: Project[] }>()

// ── Filtres ────────────────────────────────────────────────
const categories = computed(() => {
  const cats = ['Tous', ...new Set(props.projects.map(p => p.category))]
  return cats
})

const activeCategory = ref('Tous')

const filteredProjects = computed(() => {
  if (activeCategory.value === 'Tous') return props.projects
  return props.projects.filter(p => p.category === activeCategory.value)
})
</script>