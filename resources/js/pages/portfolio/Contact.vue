<template>
  <div class="max-w-5xl mx-auto px-6 py-16">

    <!-- Header -->
    <div class="mb-16">
      <p class="text-xs text-neutral-400 uppercase tracking-widest mb-4">Contact</p>
      <h1 class="text-3xl md:text-5xl font-semibold tracking-tight mb-5 text-neutral-900 dark:text-neutral-100">
        Travaillons ensemble
      </h1>
      <p class="text-neutral-600 dark:text-neutral-400 max-w-xl leading-relaxed">
        Un projet en tête ? Une question ? N'hésitez pas à me contacter, je réponds sous 24h.
      </p>
    </div>

    <div class="grid md:grid-cols-2 gap-12 lg:gap-20">

      <!-- ── Colonne gauche : infos ──────────────────────── -->
      <div class="space-y-3">

        <!-- Cartes infos -->
        <a
          v-for="info in contactInfos"
          :key="info.label"
          :href="info.href"
          target="_blank"
          class="group flex items-center gap-4 p-4 bg-neutral-50 dark:bg-neutral-900 border border-neutral-200 dark:border-neutral-800 rounded-2xl hover:border-neutral-300 dark:hover:border-neutral-700 hover:bg-white dark:hover:bg-neutral-800/60 transition-all"
        >
          <div class="w-10 h-10 bg-white dark:bg-neutral-800 border border-neutral-200 dark:border-neutral-700 rounded-xl flex items-center justify-center text-base shrink-0 shadow-sm">
            {{ info.icon }}
          </div>
          <div class="flex-1 min-w-0">
            <p class="text-xs text-neutral-400 uppercase tracking-widest mb-0.5">{{ info.label }}</p>
            <p class="text-sm font-medium text-neutral-800 dark:text-neutral-200 truncate">{{ info.value }}</p>
          </div>
          <span class="text-neutral-300 dark:text-neutral-600 group-hover:text-neutral-600 dark:group-hover:text-neutral-300 group-hover:translate-x-0.5 transition-all text-sm">
            →
          </span>
        </a>

        <!-- Badge disponibilité -->
        <div class="p-5 border border-emerald-200 dark:border-emerald-900 bg-emerald-50 dark:bg-emerald-950/30 rounded-2xl mt-2">
          <div class="flex items-center gap-2 mb-2">
            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse shrink-0"></span>
            <p class="text-sm font-semibold text-emerald-800 dark:text-emerald-400">Disponible</p>
          </div>
          <p class="text-xs text-emerald-700 dark:text-emerald-500 leading-relaxed">
            Actuellement disponible pour des missions freelance ou un poste fullstack.
          </p>
        </div>

      </div>

      <!-- ── Colonne droite : formulaire ────────────────── -->
      <div>

        <!-- Succès -->
        <div
          v-if="form.recentlySuccessful"
          class="mb-6 p-4 bg-emerald-50 dark:bg-emerald-950/30 border border-emerald-200 dark:border-emerald-800 rounded-xl"
        >
          <div class="flex items-center gap-2">
            <span class="text-emerald-600 dark:text-emerald-400 text-base">✅</span>
            <p class="text-sm font-medium text-emerald-800 dark:text-emerald-400">Message envoyé !</p>
          </div>
          <p class="text-xs text-emerald-600 dark:text-emerald-500 mt-1 ml-6">Je vous répondrai sous 24h.</p>
        </div>

        <form @submit.prevent="submit" class="space-y-4">

          <!-- Nom + Email côte à côte -->
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-xs text-neutral-500 dark:text-neutral-400 font-medium mb-2">
                Nom
              </label>
              <input
                v-model="form.name"
                type="text"
                placeholder="Votre nom"
                class="w-full px-4 py-2.5 text-sm bg-white dark:bg-neutral-900 border border-neutral-200 dark:border-neutral-700 rounded-xl focus:outline-none focus:border-neutral-500 dark:focus:border-neutral-500 transition-colors placeholder-neutral-300 dark:placeholder-neutral-600 text-neutral-900 dark:text-neutral-100"
              />
              <p v-if="form.errors.name" class="mt-1.5 text-xs text-red-500">{{ form.errors.name }}</p>
            </div>

            <div>
              <label class="block text-xs text-neutral-500 dark:text-neutral-400 font-medium mb-2">
                Email
              </label>
              <input
                v-model="form.email"
                type="email"
                placeholder="votre@email.com"
                class="w-full px-4 py-2.5 text-sm bg-white dark:bg-neutral-900 border border-neutral-200 dark:border-neutral-700 rounded-xl focus:outline-none focus:border-neutral-500 dark:focus:border-neutral-500 transition-colors placeholder-neutral-300 dark:placeholder-neutral-600 text-neutral-900 dark:text-neutral-100"
              />
              <p v-if="form.errors.email" class="mt-1.5 text-xs text-red-500">{{ form.errors.email }}</p>
            </div>
          </div>

          <!-- Sujet -->
          <div>
            <label class="block text-xs text-neutral-500 dark:text-neutral-400 font-medium mb-2">
              Sujet
            </label>
            <div class="flex flex-wrap gap-2">
              <button
                v-for="s in subjects"
                :key="s"
                type="button"
                @click="form.subject = s"
                class="px-3.5 py-1.5 text-xs rounded-full border transition-all"
                :class="form.subject === s
                  ? 'bg-neutral-900 dark:bg-neutral-100 text-white dark:text-neutral-900 border-neutral-900 dark:border-neutral-100'
                  : 'border-neutral-200 dark:border-neutral-700 text-neutral-600 dark:text-neutral-400 hover:border-neutral-400 dark:hover:border-neutral-500 bg-white dark:bg-neutral-900'"
              >
                {{ s }}
              </button>
            </div>
            <p v-if="form.errors.subject" class="mt-1.5 text-xs text-red-500">{{ form.errors.subject }}</p>
          </div>

          <!-- Message -->
          <div>
            <label class="block text-xs text-neutral-500 dark:text-neutral-400 font-medium mb-2">
              Message
            </label>
            <textarea
              v-model="form.message"
              rows="5"
              placeholder="Décrivez votre projet ou votre demande..."
              class="w-full px-4 py-3 text-sm bg-white dark:bg-neutral-900 border border-neutral-200 dark:border-neutral-700 rounded-xl focus:outline-none focus:border-neutral-500 dark:focus:border-neutral-500 transition-colors placeholder-neutral-300 dark:placeholder-neutral-600 resize-none text-neutral-900 dark:text-neutral-100"
            ></textarea>
            <div class="flex items-center justify-between mt-1.5">
              <p v-if="form.errors.message" class="text-xs text-red-500">{{ form.errors.message }}</p>
              <p class="text-xs text-neutral-400 ml-auto">{{ form.message.length }} / 2000</p>
            </div>
          </div>

          <!-- Submit -->
          <button
            type="submit"
            :disabled="form.processing || !form.subject"
            class="w-full py-3 bg-neutral-900 dark:bg-neutral-100 text-white dark:text-neutral-900 text-sm font-medium rounded-xl hover:bg-neutral-700 dark:hover:bg-neutral-300 transition-colors disabled:opacity-40 disabled:cursor-not-allowed"
          >
            <span v-if="form.processing" class="flex items-center justify-center gap-2">
              <svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"/>
              </svg>
              Envoi en cours...
            </span>
            <span v-else>Envoyer le message →</span>
          </button>

        </form>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'
import PortfolioLayout from '@/layouts/PortfolioLayout.vue'

defineOptions({ layout: PortfolioLayout })

const contactInfos = [
  { icon: '📧', label: 'Email',        value: 'idiaw.dieng@gmail.com',      href: 'mailto:idiaw.dieng@gmail.com'      },
  { icon: '💼', label: 'LinkedIn',     value: 'linkedin.com/in/ibrahima',  href: 'https://www.linkedin.com/in/ibrahima-diaw-dieng/' },
  { icon: '🐙', label: 'GitHub',       value: 'https://github.com/diengibrahima',       href: 'https://github.com/diengibrahima'      },
  { icon: '📍', label: 'Localisation', value: 'Sénégal — Remote OK',       href: '#'                                },
]

const subjects = ['Freelance', 'Emploi', 'Collaboration', 'Autre']

const form = useForm({
  name: '',
  email: '',
  subject: '',
  message: '',
})

const submit = () => {
  form.post('/contact', {
    onSuccess: () => form.reset(),
  })
}
</script>