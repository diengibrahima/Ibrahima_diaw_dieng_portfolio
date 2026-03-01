<template>
  <div class="max-w-5xl mx-auto px-6 py-16">

    <!-- Header -->
    <div class="mb-20">
      <p class="text-xs text-neutral-400 uppercase tracking-widest mb-4">Blog</p>
      <h1 class="text-3xl md:text-5xl font-semibold tracking-tight mb-5">
        Mes articles
      </h1>
      <p class="text-neutral-500 dark:text-neutral-400 max-w-xl leading-relaxed">
        Je partage mes expériences, mes apprentissages et mes réflexions sur le développement web et mobile.
      </p>
    </div>

    <!-- Filtres par tag -->
    <div class="flex flex-wrap gap-2 mb-14">
      <button
        @click="activeTag = null"
        class="px-3 py-1.5 text-xs rounded-full border transition-all"
        :class="activeTag === null
          ? 'bg-neutral-900 dark:bg-neutral-100 text-white dark:text-neutral-900 border-neutral-900 dark:border-neutral-100'
          : 'border-neutral-200 dark:border-neutral-700 text-neutral-500 hover:border-neutral-400'"
      >
        Tous
      </button>
      <button
        v-for="tag in allTags"
        :key="tag"
        @click="activeTag = tag"
        class="px-3 py-1.5 text-xs rounded-full border transition-all"
        :class="activeTag === tag
          ? 'bg-neutral-900 dark:bg-neutral-100 text-white dark:text-neutral-900 border-neutral-900 dark:border-neutral-100'
          : 'border-neutral-200 dark:border-neutral-700 text-neutral-500 hover:border-neutral-400'"
      >
        {{ tag }}
      </button>
    </div>

    <!-- Liste articles -->
    <div class="space-y-4">
      <Link
        v-for="(post, index) in filteredPosts"
        :key="post.id"
        :href="`/blog/${post.slug}`"
        class="group flex flex-col md:flex-row md:items-center gap-4 md:gap-8 p-6 border border-neutral-100 dark:border-neutral-800 rounded-2xl hover:border-neutral-300 dark:hover:border-neutral-600 hover:bg-neutral-50 dark:hover:bg-neutral-900/50 transition-all"
      >
        <!-- Numéro -->
        <span class="hidden md:block text-2xl font-semibold text-neutral-200 dark:text-neutral-700 w-8 shrink-0 tabular-nums">
          {{ String(index + 1).padStart(2, '0') }}
        </span>

        <!-- Contenu principal -->
        <div class="flex-1 min-w-0">
          <!-- Meta -->
          <div class="flex flex-wrap items-center gap-2 mb-3">
            <span
              v-for="tag in post.tags"
              :key="tag"
              class="text-xs px-2 py-0.5 bg-neutral-100 dark:bg-neutral-800 text-neutral-500 dark:text-neutral-400 rounded-md"
            >
              {{ tag }}
            </span>
          </div>

          <!-- Titre -->
          <h2 class="text-base font-semibold mb-2 group-hover:text-neutral-500 dark:group-hover:text-neutral-300 transition-colors leading-snug">
            {{ post.title }}
          </h2>

          <!-- Excerpt -->
          <p class="text-sm text-neutral-400 dark:text-neutral-500 leading-relaxed line-clamp-2">
            {{ post.excerpt }}
          </p>
        </div>

        <!-- Droite : date + durée + flèche -->
        <div class="flex md:flex-col items-center md:items-end justify-between md:justify-center gap-2 shrink-0">
          <div class="text-right">
            <p class="text-xs text-neutral-400 whitespace-nowrap">{{ formatDate(post.published_at) }}</p>
            <p class="text-xs text-neutral-300 dark:text-neutral-600">{{ post.reading_time }} min</p>
          </div>
          <span class="text-neutral-300 dark:text-neutral-600 group-hover:text-neutral-900 dark:group-hover:text-neutral-100 group-hover:translate-x-1 transition-all text-lg">
            →
          </span>
        </div>
      </Link>
    </div>

    <!-- Empty state -->
    <div v-if="filteredPosts.length === 0" class="text-center py-24">
      <p class="text-4xl mb-4">✍️</p>
      <p class="text-neutral-400 text-sm">Aucun article dans cette catégorie.</p>
    </div>

    <!-- Stats footer -->
    <div class="mt-16 pt-8 border-t border-neutral-100 dark:border-neutral-800 flex items-center justify-between text-xs text-neutral-400">
      <span>{{ filteredPosts.length }} article{{ filteredPosts.length > 1 ? 's' : '' }}</span>
      <span>{{ totalReadingTime }} min de lecture au total</span>
    </div>

  </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import { ref, computed } from 'vue'
import PortfolioLayout from '@/layouts/PortfolioLayout.vue'

defineOptions({ layout: PortfolioLayout })

interface Post {
  id: number
  title: string
  slug: string
  excerpt: string
  tags: string[]
  reading_time: number
  published_at: string
}

const props = defineProps<{ posts: Post[] }>()

// ── Filtres par tag ────────────────────────────────────────
const activeTag = ref<string | null>(null)

const allTags = computed(() => {
  const tags = props.posts.flatMap(p => p.tags)
  return [...new Set(tags)]
})

const filteredPosts = computed(() => {
  if (!activeTag.value) return props.posts
  return props.posts.filter(p => p.tags.includes(activeTag.value!))
})

// ── Stats ──────────────────────────────────────────────────
const totalReadingTime = computed(() =>
  filteredPosts.value.reduce((acc, p) => acc + p.reading_time, 0)
)

// ── Date ───────────────────────────────────────────────────
const formatDate = (date: string) => {
  return new Date(date).toLocaleDateString('fr-FR', {
    day: 'numeric',
    month: 'short',
    year: 'numeric',
  })
}
</script>