<template>
  <div class="max-w-3xl mx-auto px-6 py-16">

    <!-- Retour -->
    <Link
      href="/blog"
      class="inline-flex items-center gap-2 text-sm text-neutral-400 hover:text-neutral-900 dark:hover:text-neutral-100 transition-colors mb-12"
    >
      ← Retour au blog
    </Link>

    <!-- Header article -->
    <header class="mb-12">
      <div class="flex flex-wrap items-center gap-3 mb-6">
        <span
          v-for="tag in post.tags"
          :key="tag"
          class="text-xs px-2 py-1 bg-neutral-100 dark:bg-neutral-800 text-neutral-500 dark:text-neutral-400 rounded-md"
        >
          {{ tag }}
        </span>
        <span class="text-xs text-neutral-300 dark:text-neutral-600">·</span>
        <span class="text-xs text-neutral-400">{{ post.reading_time }} min de lecture</span>
        <span class="text-xs text-neutral-300 dark:text-neutral-600">·</span>
        <span class="text-xs text-neutral-400">{{ formatDate(post.published_at) }}</span>
      </div>

      <h1 class="text-3xl md:text-4xl font-semibold tracking-tight mb-6">
        {{ post.title }}
      </h1>

      <p class="text-lg text-neutral-500 dark:text-neutral-400 leading-relaxed border-l-2 border-neutral-200 dark:border-neutral-700 pl-4">
        {{ post.excerpt }}
      </p>
    </header>

    <!-- Séparateur -->
    <div class="border-t border-neutral-100 dark:border-neutral-800 mb-12"></div>

    <!-- Contenu -->
    <div
      class="prose prose-neutral dark:prose-invert max-w-none prose-headings:font-semibold prose-headings:tracking-tight prose-a:text-neutral-900 dark:prose-a:text-neutral-100 prose-code:text-sm"
      v-html="post.content"
    ></div>

    <!-- Footer article -->
    <div class="mt-16 pt-8 border-t border-neutral-100 dark:border-neutral-800 flex items-center justify-between">
      <Link
        href="/blog"
        class="text-sm text-neutral-400 hover:text-neutral-900 dark:hover:text-neutral-100 transition-colors"
      >
        ← Tous les articles
      </Link>
      <Link
        href="/contact"
        class="text-sm text-neutral-400 hover:text-neutral-900 dark:hover:text-neutral-100 transition-colors"
      >
        Me contacter →
      </Link>
    </div>

  </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import PortfolioLayout from '@/layouts/PortfolioLayout.vue'

defineOptions({ layout: PortfolioLayout })

interface Post {
  id: number
  title: string
  slug: string
  excerpt: string
  content: string
  tags: string[]
  reading_time: number
  published_at: string
}

defineProps<{ post: Post }>()

const formatDate = (date: string) => {
  return new Date(date).toLocaleDateString('fr-FR', {
    day: 'numeric',
    month: 'long',
    year: 'numeric',
  })
}
</script>