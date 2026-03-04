<template>
  <div class="min-h-screen bg-white dark:bg-gray-950 text-gray-900 dark:text-gray-100 transition-colors duration-300">
    
    <!-- Navbar -->
    <header class="fixed top-0 left-0 right-0 z-50 border-b border-gray-100 dark:border-gray-800 bg-white/80 dark:bg-gray-950/80 backdrop-blur-sm">
      <nav class="max-w-5xl mx-auto px-6 h-16 flex items-center justify-between">
        
        <!-- Logo -->
        <Link href="/" class="text-lg font-semibold tracking-tight hover:opacity-70 transition-opacity">
          dev.portfolio
        </Link>

        <!-- Liens desktop -->
        <ul class="hidden md:flex items-center gap-8 text-sm text-gray-500 dark:text-gray-400">
          <li v-for="link in navLinks" :key="link.href">
            <Link
              :href="link.href"
              class="hover:text-gray-900 dark:hover:text-gray-100 transition-colors"
              :class="{ 'text-gray-900 dark:text-gray-100 font-medium': isActive(link.href) }"
            >
              {{ link.label }}
            </Link>
          </li>
        </ul>

        <!-- Actions droite -->
        <div class="flex items-center gap-3">
          <!-- Toggle dark mode -->
          <button
            @click="toggleTheme"
            class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors"
          >
            <span v-if="isDark">☀️</span>
            <span v-else>🌙</span>
          </button>

          <!-- CV Download -->
          <a
            href="/cv/download"
            class="hidden md:inline-flex items-center gap-2 px-4 py-2 text-sm font-medium border border-gray-900 dark:border-gray-100 rounded-lg hover:bg-gray-900 hover:text-white dark:hover:bg-gray-100 dark:hover:text-gray-900 transition-all"
          >
            CV
          </a>

          <!-- Menu mobile -->
          <button
            @click="mobileOpen = !mobileOpen"
            class="md:hidden p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors"
          >
            <span v-if="mobileOpen">✕</span>
            <span v-else>☰</span>
          </button>
        </div>
      </nav>

      <!-- Menu mobile -->
      <div v-if="mobileOpen" class="md:hidden border-t border-gray-100 dark:border-gray-800 bg-white dark:bg-gray-950">
        <ul class="max-w-5xl mx-auto px-6 py-4 flex flex-col gap-4 text-sm">
          <li v-for="link in navLinks" :key="link.href">
            <Link
              :href="link.href"
              class="block text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 transition-colors"
              @click="mobileOpen = false"
            >
              {{ link.label }}
            </Link>
          </li>
        </ul>
      </div>
    </header>

    <!-- Contenu principal -->
    <main class="pt-16">
      <slot />
    </main>

    <!-- Footer -->
    <footer class="border-t border-gray-100 dark:border-gray-800 mt-24">
      <div class="max-w-5xl mx-auto px-6 py-8 flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-gray-400">
        <p>© {{ year }} — Tous droits réservés</p>
        <div class="flex items-center gap-6">
          <a href="https://github.com/diengibrahima" target="_blank" class="hover:text-gray-900 dark:hover:text-gray-100 transition-colors">GitHub</a>
          <a href='https://www.linkedin.com/in/ibrahima-diaw-dieng/'  target="_blank" class="hover:text-gray-900 dark:hover:text-gray-100 transition-colors">LinkedIn</a>
          <a href="mailto:contact@monsite.com" class="hover:text-gray-900 dark:hover:text-gray-100 transition-colors">Email</a>
        </div>
      </div>
    </footer>

  </div>
</template>

<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3'
import { ref, computed } from 'vue'
import { useAppearance } from '@/composables/useAppearance'

// Dark mode
const { appearance, updateAppearance } = useAppearance()
const isDark = computed(() => appearance.value === 'dark')
const toggleTheme = () => updateAppearance(isDark.value ? 'light' : 'dark')

// Année dynamique
const year = new Date().getFullYear()

// Menu mobile
const mobileOpen = ref(false)

// Liens de navigation
const navLinks = [
  { href: '/',          label: 'Accueil'     },
  { href: '/projects',  label: 'Projets'     },
  { href: '/skills',    label: 'Compétences' },
  { href: '/blog',      label: 'Blog'        },
  { href: '/contact',   label: 'Contact'     },
]

// Lien actif
const page = usePage()
const isActive = (href: string) => {
  if (href === '/') return page.url === '/'
  return page.url.startsWith(href)
}
</script>