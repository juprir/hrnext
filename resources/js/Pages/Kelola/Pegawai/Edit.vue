<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, usePage, router } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const pegawai = usePage().props.data.data;

const form = useForm({
  id_sidik_jari: pegawai.id_sidik_jari,
});

</script>

<template>
  <Head :title="'Edit Pegawai: ' + pegawai.nama" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Pegawai: {{ pegawai.nama }}</h2>
    </template>

    <div class="py-12">
      <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
          <div class="px-4 py-5 sm:px-6">
            <h3 class="text-base font-semibold leading-6 text-gray-900">Informasi pegawai</h3>
          </div>
          <div class="border-t border-gray-200">
            <dl>
              <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Nama</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ pegawai.nama }}</dd>
              </div>
              <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">NIP/NRP</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ pegawai.nip }}</dd>
              </div>
              <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Pangkat</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ pegawai.pangkat }}</dd>
              </div>
              <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Jabatan</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ pegawai.jabatan }}</dd>
              </div>
            </dl>
          </div>
        </div>
        <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="px-6 pb-4 lg:px-8">
            <form @submit.prevent="form.patch(route('kelola.pegawai.update', pegawai.id))" class="mt-6 space-y-6">
              <div>
                <InputLabel for="id_sidik_jari" value="ID Sidik Jari" />

                <TextInput id="id_sidik_jari" type="text" class="mt-1 block w-full" v-model="form.id_sidik_jari" required
                  autofocus autocomplete="id_sidik_jari" />

                <InputError class="mt-2" :message="form.errors.id_sidik_jari" />
              </div>

              <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Simpan</PrimaryButton>

                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                  <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Tersimpan.</p>
                </Transition>

                <SecondaryButton @click="router.visit(route('kelola.pegawai.index'))">Batal</SecondaryButton>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </AuthenticatedLayout>
</template>
