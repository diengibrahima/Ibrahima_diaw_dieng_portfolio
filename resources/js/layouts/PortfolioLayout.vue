<template>
  <div class="min-h-screen bg-white dark:bg-neutral-950 text-neutral-900 dark:text-neutral-100 transition-colors duration-300">

    <!-- Navbar -->
    <header class="fixed top-0 left-0 right-0 z-50 border-b border-neutral-100 dark:border-neutral-800 bg-white/80 dark:bg-neutral-950/80 backdrop-blur-md">
      <nav class="max-w-5xl mx-auto px-6 h-16 flex items-center justify-between">

        <!-- Logo -->
        <Link href="/" class="font-semibold tracking-tight hover:opacity-60 transition-opacity">
          idd<span class="text-neutral-400">.</span>dev
        </Link>

        <!-- Liens desktop -->
        <ul class="hidden md:flex items-center gap-8 text-sm text-neutral-500 dark:text-neutral-400">
          <li v-for="link in navLinks" :key="link.href">
            <Link
              :href="link.href"
              class="hover:text-neutral-900 dark:hover:text-neutral-100 transition-colors"
              :class="{ 'text-neutral-900 dark:text-neutral-100 font-medium': isActive(link.href) }"
            >
              {{ link.label }}
            </Link>
          </li>
        </ul>

        <!-- Droite : dark mode + CV + menu mobile -->
        <div class="flex items-center gap-2">

          <!-- Toggle dark mode -->
          <button
            @click="toggleTheme"
            class="p-2 rounded-lg hover:bg-neutral-100 dark:hover:bg-neutral-800 transition-colors text-sm"
            :aria-label="isDark ? 'Mode clair' : 'Mode sombre'"
          >
            {{ isDark ? '☀️' : '🌙' }}
          </button>

          <!-- CV -->
          <a
            href="/cv/download"
            class="hidden md:inline-flex items-center gap-2 px-4 py-1.5 text-sm font-medium border border-neutral-900 dark:border-neutral-100 rounded-full hover:bg-neutral-900 hover:text-white dark:hover:bg-neutral-100 dark:hover:text-neutral-900 transition-all"
          >
            CV ↓
          </a>

          <!-- Burger mobile -->
          <button
            @click="mobileOpen = !mobileOpen"
            class="md:hidden p-2 rounded-lg hover:bg-neutral-100 dark:hover:bg-neutral-800 transition-colors"
          >
            {{ mobileOpen ? '✕' : '☰' }}
          </button>
        </div>
      </nav>

      <!-- Menu mobile -->
      <Transition name="slide">
        <div v-if="mobileOpen" class="md:hidden border-t border-neutral-100 dark:border-neutral-800 bg-white dark:bg-neutral-950">
          <ul class="max-w-5xl mx-auto px-6 py-4 flex flex-col gap-4 text-sm">
            <li v-for="link in navLinks" :key="link.href">
              <Link
                :href="link.href"
                class="block text-neutral-500 dark:text-neutral-400 hover:text-neutral-900 dark:hover:text-neutral-100 transition-colors py-1"
                @click="mobileOpen = false"
              >
                {{ link.label }}
              </Link>
            </li>
            <li>
              <a href="/cv/download" class="block text-neutral-500 dark:text-neutral-400 hover:text-neutral-900 dark:hover:text-neutral-100 transition-colors py-1">
                Télécharger CV
              </a>
            </li>
          </ul>
        </div>
      </Transition>
    </header>

    <!-- Page courante -->
    <main class="pt-16">
      <slot />
    </main>

    <!-- Footer -->
    <footer class="border-t border-neutral-100 dark:border-neutral-800 mt-32">
      <div class="max-w-5xl mx-auto px-6 py-8 flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-neutral-400">
        <p>© {{ year }} Ibrahima Diaw Dieng</p>
        <div class="flex items-center gap-6">
          <a
            v-for="social in socials"
            :key="social.label"
            :href="social.href"
            target="_blank"
            class="hover:text-neutral-900 dark:hover:text-neutral-100 transition-colors"
          >
            {{ social.label }}
          </a>
        </div>
      </div>
    </footer>

  </div>
</template>

<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3'
import { ref, computed } from 'vue'
import { useAppearance } from '@/composables/useAppearance'

// ── Dark mode ──────────────────────────────────────────────
const { appearance, updateAppearance } = useAppearance()
const isDark = computed(() => appearance.value === 'dark')
const toggleTheme = () => updateAppearance(isDark.value ? 'light' : 'dark')

// ── Navigation ─────────────────────────────────────────────
const navLinks = [
  { href: '/',         label: 'Accueil'     },
  { href: '/projects', label: 'Projets'     },
  { href: '/skills',   label: 'Compétences' },
  { href: '/blog',     label: 'Blog'        },
  { href: '/contact',  label: 'Contact'     },
]

const socials = [
  { label: 'GitHub',   href: 'https://github.com/diengibrahima' },
  { label: 'LinkedIn', href: 'https://www.linkedin.com/in/ibrahima-diaw-dieng/' },
  { label: 'Email',    href: 'mailto:idiaw.dieng@gmail.com' },
]

// ── Lien actif ─────────────────────────────────────────────
const page = usePage()
const isActive = (href: string) => {
  if (href === '/') return page.url === '/'
  return page.url.startsWith(href)
}

// ── Mobile menu ────────────────────────────────────────────
const mobileOpen = ref(false)

// ── Année ──────────────────────────────────────────────────
const year = new Date().getFullYear()
</script>

<style scoped>
.slide-enter-active,
.slide-leave-active {
  transition: all 0.2s ease;
}
.slide-enter-from,
.slide-leave-to {
  opacity: 0;
  transform: translateY(-8px);
}
</style>