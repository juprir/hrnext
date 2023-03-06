<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, usePage, router } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Checkbox from '@/Components/Checkbox.vue';

const user = usePage().props.data.data;
const roles = usePage().props.roles;
const userRoles = user.roles.map(item => item.name);

const form = useForm({
  roles: userRoles,
});
</script>

<template>
  <Head :title="'Edit pengguna: ' + user.nama" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Pengguna: {{ user.nama }}</h2>
    </template>

    <div class="py-12">
      <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
          <div class="px-4 py-5 sm:px-6">
            <h3 class="text-base font-semibold leading-6 text-gray-900">Informasi pengguna</h3>
          </div>
          <div class="border-t border-gray-200">
            <dl>
              <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Nama</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ user.nama }}</dd>
              </div>
              <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Jabatan</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ user.jabatan }}</dd>
              </div>
            </dl>
          </div>
        </div>
        <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="px-6 pb-4 lg:px-8">
            <form @submit.prevent="form.patch(route('kelola.user.update', user.id))" class="mt-6 space-y-6">
              <div>
                <InputLabel for="role" value="Peran" />

                <div class="mt-2 grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div v-for="role in roles" :key="role.id">
                    <label class="flex items-center">
                      <Checkbox v-model:checked="form.roles" :value="role" />
                      <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ role }}</span>
                    </label>
                  </div>
                </div>

                <InputError class="mt-2" :message="form.errors.roles" />

              </div>

              <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Simpan</PrimaryButton>

                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                  <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Tersimpan.</p>
                </Transition>

                <SecondaryButton @click="router.visit(route('kelola.user.index'))">Batal</SecondaryButton>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </AuthenticatedLayout>
</template>
