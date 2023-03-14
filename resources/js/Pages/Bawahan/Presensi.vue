<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { format, parse, parseISO } from 'date-fns';
import { id } from 'date-fns/locale';
import { ref, onBeforeMount } from 'vue';

defineProps({
  list: {
    type: Object,
  }
});
</script>

<template>
  <Head title="Presensi bawahan" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Presensi bawahan</h2>
    </template>

    <div class="py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
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
                          Nama</th>
                        <th scope="col"
                          class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                          Jabatan</th>
                        <th scope="col"
                          class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                          Waktu Datang</th>
                        <th scope="col"
                          class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                          Waktu Pulang</th>
                        <th scope="col"
                          class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                          Kategori</th>
                      </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                      <tr v-for="item in list" :key="item.id">
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                          {{ item.nama }}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                          {{ item.jabatan }}
                        </td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
                          {{ item.waktu_datang }}
                        </td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
                          {{ item.waktu_pulang }}
                        </td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ item.kategori }}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ item.potongan_tunjangan_kinerja ?
                          item.potongan_tunjangan_kinerja / 100 + '%' : ''
                        }}</td>
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
