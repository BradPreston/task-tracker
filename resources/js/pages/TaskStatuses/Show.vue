<script setup lang="ts">
    import { Head } from '@inertiajs/vue3';

    import AppLayout from '@/layouts/AppLayout.vue';
    import { index} from '@/routes/status';
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
                <p>{{ props.status.title }}</p>
            </div>
        </AppLayout>
    </template>
