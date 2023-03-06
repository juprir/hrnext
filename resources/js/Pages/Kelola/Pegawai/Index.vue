<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { PencilSquareIcon } from '@heroicons/vue/24/solid';

defineProps({
  data: Object,
});

</script>

<template>
  <Head title="Pegawai" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Pegawai</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                          Nama</th>
                        <th scope="col"
                          class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                          NIP/NRP</th>
                        <th scope="col"
                          class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                          Pangkat/Gol.</th>
                        <th scope="col"
                          class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                          Jabatan</th>
                        <th scope="col"
                          class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                          ID Sidik Jari</th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                          <span class="sr-only">Edit</span>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                      <tr v-for="pegawai in data.data" :key="pegawai.id">
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                          {{ pegawai.nama }}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                          {{ pegawai.nip }}
                        </td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
                          {{ pegawai.pangkat }}
                        </td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
                          {{ pegawai.jabatan }}
                        </td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
                          {{ pegawai.id_sidik_jari }}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
                          <Link :href="route('kelola.pegawai.edit', pegawai.id)">
                          <PencilSquareIcon class="h-4 w-4 flex-shrink-0 self-center text-blue-600" aria-hidden="true" />
                          </Link>
                        </td>
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
