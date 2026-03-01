<template>
  <div class="max-w-5xl mx-auto px-6 py-16">

    <!-- Header -->
    <div class="mb-16">
      <p class="text-xs text-neutral-400 uppercase tracking-widest mb-4">Compétences</p>
      <h1 class="text-3xl md:text-4xl font-semibold tracking-tight mb-4">
        Ma stack technique
      </h1>
      <p class="text-neutral-500 dark:text-neutral-400 max-w-xl">
        Les technologies que j'utilise au quotidien pour construire des applications robustes et modernes.
      </p>
    </div>

    <!-- Catégories -->
    <div class="space-y-16">
      <div v-for="(skillList, category) in skills" :key="category">

        <!-- Titre catégorie -->
        <div class="flex items-center gap-4 mb-8">
          <p class="text-xs text-neutral-400 uppercase tracking-widest">{{ category }}</p>
          <div class="flex-1 border-t border-neutral-100 dark:border-neutral-800"></div>
        </div>

        <!-- Skills grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
          <div
            v-for="skill in skillList"
            :key="skill.id"
            class="p-5 border border-neutral-100 dark:border-neutral-800 rounded-2xl hover:border-neutral-300 dark:hover:border-neutral-600 transition-all group"
          >
            <!-- Icon + Nom -->
            <div class="flex items-center gap-3 mb-4">
              <span class="text-2xl">{{ skill.icon }}</span>
              <span class="font-medium text-sm">{{ skill.name }}</span>
            </div>

            <!-- Barre de niveau -->
            <div class="space-y-1.5">
              <div class="h-1 bg-neutral-100 dark:bg-neutral-800 rounded-full overflow-hidden">
                <div
                  class="h-full bg-neutral-900 dark:bg-neutral-100 rounded-full transition-all duration-700"
                  :style="{ width: skill.level + '%' }"
                ></div>
              </div>
              <p class="text-xs text-neutral-400 text-right">{{ skill.level }}%</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- CTA -->
    <div class="mt-24 p-8 border border-neutral-100 dark:border-neutral-800 rounded-2xl text-center">
      <p class="text-neutral-400 text-sm mb-4">Toujours en apprentissage 🚀</p>
      <h2 class="text-xl font-semibold mb-2">Curieux et passionné</h2>
      <p class="text-neutral-500 dark:text-neutral-400 text-sm max-w-md mx-auto">
        Je me forme continuellement aux nouvelles technologies pour rester à la pointe.
      </p>
    </div>

  </div>
</template>

<script setup lang="ts">
import PortfolioLayout from '@/layouts/PortfolioLayout.vue'

defineOptions({ layout: PortfolioLayout })

interface Skill {
  id: number
  name: string
  icon: string
  category: string
  level: number
}

defineProps<{
  skills: Record<string, Skill[]>
}>()
</script>