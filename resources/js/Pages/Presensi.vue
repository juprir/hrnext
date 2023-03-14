<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { format, parse, parseISO } from 'date-fns';
import { id } from 'date-fns/locale';
import { ref, onBeforeMount } from 'vue';

defineProps({
  list: {
    type: Object,
  },
  periode: {
    type: String
  },
  statistik: {
    type: Object
  }
});

const pilihanBulan = [
  { number: 1, name: 'Januari' },
  { number: 2, name: 'Februari' },
  { number: 3, name: 'Maret' },
  { number: 4, name: 'April' },
  { number: 5, name: 'Mei' },
  { number: 6, name: 'Juni' },
  { number: 7, name: 'Juli' },
  { number: 8, name: 'Agustus' },
  { number: 9, name: 'September' },
  { number: 10, name: 'Oktober' },
  { number: 11, name: 'November' },
  { number: 12, name: 'Desember' },
];

const params = new URLSearchParams(window.location.search);

const tahunIni = new Date().getFullYear();
const bulanIni = new Date().getMonth();

const pilihanTahun = [
  tahunIni - 2,
  tahunIni - 1,
  tahunIni,
];

const tahunDipilih = ref('');
const bulanDipilih = ref('');

onBeforeMount(() => {
  tahunDipilih.value = params.get('tahun') || tahunIni;
  bulanDipilih.value = params.get('bulan') || bulanIni + 1;
})
</script>

<template>
  <Head :title="'Presensi ' + periode" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Presensi: {{ periode }}</h2>
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
              <form method="GET">
                <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">

                  <div>
                    <select id="bulan" name="bulan" v-model="bulanDipilih"
                      class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                      <option v-for="bulan in pilihanBulan" :key="bulan.number" :value="bulan.number">{{ bulan.name
                      }}
                      </option>
                    </select>
                  </div>
                  <div>
                    <select id="tahun" name="tahun" v-model="tahunDipilih"
                      class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                      <option v-for="tahun in pilihanTahun" :key="tahun" :value="tahun">{{ tahun }}
                      </option>
                    </select>
                  </div>
                  <div>
                    <button type="submit"
                      class="mt-1 inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                      Lihat
                    </button>
                  </div>
                </div>
              </form>
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
                          Hari</th>
                        <th scope="col"
                          class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                          Tanggal</th>
                        <th scope="col"
                          class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                          Waktu Datang</th>
                        <th scope="col"
                          class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                          Waktu Pulang</th>
                        <th scope="col"
                          class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                          Kategori</th>
                        <th scope="col"
                          class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                          Potongan</th>
                      </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                      <tr v-for="item in list" :key="item.tanggal">
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                          {{ format(parse(item.tanggal, 'yyyy-MM-dd', new Date()), 'EEEE', { locale: id }) }}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                          {{ format(parse(item.tanggal, 'yyyy-MM-dd', new Date()), 'dd-MM-yyyy') }}
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
