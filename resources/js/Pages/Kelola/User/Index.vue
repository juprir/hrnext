<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { PencilSquareIcon } from '@heroicons/vue/24/solid';

defineProps({
  data: Object,
});

</script>

<template>
  <Head title="Pengguna" />

  <AuthenticatedLayout>
    <template #header>
      <div class="md:flex md:items-center md:justify-between">
        <div class="min-w-0 flex-1">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">Pengguna</h2>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
          <Link :href="route('kelola.user.create')"
            class="ml-3 inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
          Tambah
          </Link>
        </div>
      </div>
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
                          Jabatan</th>
                        <th scope="col"
                          class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                          Peran</th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                          <span class="sr-only">Edit</span>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                      <tr v-for="user in data.data" :key="user.id">
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                          {{ user.nama }}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                          {{ user.jabatan }}
                        </td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
                          <p v-for="role in user.roles">{{ role.name }}</p>
                        </td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
                          <Link :href="route('kelola.user.edit', user.id)">
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
