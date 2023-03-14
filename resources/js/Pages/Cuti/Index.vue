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
  <Head title="Cuti" />

  <AuthenticatedLayout>
    <template #header>
      <div class="md:flex md:items-center md:justify-between">
        <div class="min-w-0 flex-1">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">Cuti</h2>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
          <Link :href="route('cuti.create')"
            class="ml-3 inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
          Tambah
          </Link>
        </div>
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Statistik -->
        <div>
          <dl class="-mt-6 grid grid-cols-1 gap-5 sm:grid-cols-3">
            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
              <dt class="truncate text-sm font-medium text-gray-500">{{ statistik[0].nama }}</dt>
              <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ statistik[0].stat }}</dd>
            </div>
            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
              <dt class="truncate text-sm font-medium text-gray-500">{{ statistik[1].nama }}</dt>
              <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ statistik[1].stat }}</dd>
            </div>
            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
              <dt class="truncate text-sm font-medium text-gray-500">{{ statistik[2].nama }}</dt>
              <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ statistik[2].stat }}</dd>
            </div>
          </dl>
        </div>
        <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="px-6 lg:px-8">
            <!-- Tabel -->
            <div class="flow-root">
              <div class="-my-2 -mx-6 overflow-x-auto lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                  <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                      <tr>
                        <th scope="col"
                          class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                          Tanggal Mulai</th>
                        <th scope="col"
                          class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                          Tanggal Selesai</th>
                        <th scope="col"
                          class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                          Status</th>
                        <th scope="col"
                          class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                          Jenis Cuti</th>
                        <th scope="col"
                          class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                          Alasan Cuti</th>
                      </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                      <tr v-for="item in list" :key="item.tanggal">
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                          {{ format(parseISO(item.tanggal_mulai, 'yyyy-MM-dd', new Date()), 'dd-MM-yyyy') }}
                        </td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                          {{ format(parseISO(item.tanggal_selesai, 'yyyy-MM-dd', new Date()), 'dd-MM-yyyy') }}
                        </td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
                          {{ item.status }}
                        </td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
                          {{ item.jenis_cuti.nama }}
                        </td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
                          {{ item.alasan_cuti.alasan }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </AuthenticatedLayout>
</template>
