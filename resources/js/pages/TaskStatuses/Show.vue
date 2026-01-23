<script setup lang="ts">
    import { Head } from '@inertiajs/vue3';

    import { Button } from '@/components/ui/button';
    import AppLayout from '@/layouts/AppLayout.vue';
    import { formatDate } from '@/lib/utils';
    import { index, edit } from '@/routes/status';
    import { type BreadcrumbItem, type TaskStatus } from '@/types';


    const breadcrumbs: BreadcrumbItem[] = [
        {
            title: 'Statuses',
            href: index().url,
        }
    ];

    interface Props {
        status: TaskStatus;
    }

    const props = defineProps<Props>();
    </script>

    <template>
        <Head title="Task Status" />

        <AppLayout :breadcrumbs="breadcrumbs">
            <div
                class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4"
            >
                <h1>Task Status</h1>
                <p><strong>Title:</strong> {{ props.status.title }}</p>
                <p><strong>Created At:</strong> {{ formatDate(props.status.created_at) }}</p>
                <p><strong>Updated At:</strong> {{ formatDate(props.status.updated_at) }}</p>
                <Button as-child class="mt-4 w-fit">
                    <a :href="edit(props.status.id).url">Edit</a>
                </Button>
            </div>
        </AppLayout>
    </template>
