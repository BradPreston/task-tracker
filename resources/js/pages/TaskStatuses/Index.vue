<script setup lang="ts">
import { Head, router } from '@inertiajs/vue3';

import { Button } from '@/components/ui/button';
import AppLayout from '@/layouts/AppLayout.vue';
import { formatDate } from '@/lib/utils';
import { index, create, destroy, edit, show } from '@/routes/status';
import { type BreadcrumbItem, type TaskStatus } from '@/types';

interface Props {
    taskStatuses: TaskStatus[];
}

const props = defineProps<Props>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Statuses',
        href: index().url,
    },
];

const deleteStatus = (statusId: number) => {
  if (confirm('Are you sure you want to delete this status?')) {
    router.delete(destroy({ taskStatus: statusId }).url);
  }
};
</script>

<template>
    <Head title="Task Statuses" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div
            class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4"
        >
            <div class="flex justify-between items-start">
                <h1>Task Statuses</h1>
                <Button as-child>
                    <a :href="create().url">Create Status</a>
                </Button>
            </div>
                <table class="w-full table-auto border-collapse border border-gray-100 rounded-md overflow-hidden">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Created At</th>
                            <th class="px-4 py-2">Updated At</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="status in props.taskStatuses" :key="status.id" class="text-left">
                            <td class="px-4 py-2"><a :href="show(status.id).url">{{ status.title }}</a></td>
                            <td class="px-4 py-2">{{ formatDate(status.created_at) }}</td>
                            <td class="px-4 py-2">{{ formatDate(status.updated_at) }}</td>
                            <td class="px-4 py-2 flex items-center gap-2">
                                <Button as-child>
                                    <a :href="show(status.id).url">View</a>
                                </Button>
                                <Button as-child>
                                    <a :href="edit(status.id).url">Edit</a>
                                </Button>
                                <Button variant="destructive" @click="deleteStatus(status.id)" class="cursor-pointer">
                                    Delete
                                </Button>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                    <tr class="bg-gray-100 text-left">
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Created At</th>
                            <th class="px-4 py-2">Updated At</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </tfoot>
                </table>
        </div>
    </AppLayout>
</template>
