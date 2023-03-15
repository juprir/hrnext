<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { format, parse, parseISO } from 'date-fns';
import { id } from 'date-fns/locale';
import { ref, onBeforeMount } from 'vue';

defineProps({
  list: {
    type: Object,
  },
  statistik: {
    type: Object
  }
});
</script>

<template>
  <Head title="Pengajuan Cuti" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Pengajuan Cuti</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Create ulang -->
      </div>
    </div>

  </AuthenticatedLayout>
</template>
