<script setup>
import { ref } from "vue";
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import Table from "@/Components/Table.vue";
import TableRow from "@/Components/TableRow.vue";
import TableHeaderCell from "@/Components/TableHeaderCell.vue";
import TableDataCell from "@/Components/TableDataCell.vue";
import Modal from '@/Components/Modal.vue';
import DangerButton from '@/Components/DangerButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { Head, Link } from '@inertiajs/vue3';
import { usePermission } from "@/composables/permissions";

defineProps({
    heroes: Object,
})


const { hasPermission } = usePermission();
</script>

<template>
    <Head title="Hero Index" />

    <DashboardLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="flex justify-end m-2 p-2">
                            <template v-if="hasPermission('Landing Page Content')">
                            <Link :href="route('heroes.create')" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded-md">New Hero Header</Link>
                        </template>
                        </div>

                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Image
                                    </th>
                                    <th scope="col" class="px-6 py-3">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="hero in heroes" :key="hero.id"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ hero.id }}</th>
                                    <td class="px-6 py-4">{{ hero.name }}</td>
                                    <td class="px-6 py-4"><img :src="hero.image" class="w-12 h-12" /></td>
                                    <td class="px-6 py-4"><template v-if="hasPermission('Landing Page Content')"><Link :href="route('heroes.edit', hero.id)" class="font-medium text-blue-500 hover:text-blue-700 mr-2">Edit</Link></template>
                                    <template v-if="hasPermission('Landing Page Content')"><Link :href="route('heroes.destroy', hero.id)"
                                        method="delete"
                                        as="button"
                                        type="button"
                                        class="font-medium text-red-500 hover:text-red-700 mr-2">Delete</Link></template>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    </div>
                </div>
    </DashboardLayout>
</template>
