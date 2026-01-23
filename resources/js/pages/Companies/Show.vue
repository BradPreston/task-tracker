<script setup lang="ts">
    import { Head } from '@inertiajs/vue3';

    import { Button } from '@/components/ui/button';
    import AppLayout from '@/layouts/AppLayout.vue';
    import { formatDate } from '@/lib/utils';
    import { type BreadcrumbItem, type Company } from '@/types';

    import { index, edit } from '@/routes/companies';

    const breadcrumbs: BreadcrumbItem[] = [
        {
            title: 'Companies',
            href: index().url,
        }
    ];

    interface Props {
        company: Company;
    }

    const props = defineProps<Props>();
    </script>

    <template>
        <Head title="Company" />

        <AppLayout :breadcrumbs="breadcrumbs">
            <div
                class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4"
            >
                <h1>Company</h1>
                <p><strong>Name:</strong> {{ props.company.name }}</p>
                <p><strong>Website:</strong> <a :href="props.company.website" target="_blank">{{ props.company.website }}</a></p>
                <p><strong>Created At:</strong> {{ formatDate(props.company.created_at) }}</p>
                <p><strong>Updated At:</strong> {{ formatDate(props.company.updated_at) }}</p>
                <Button as-child class="mt-4 w-fit">
                    <a :href="edit(props.company.id).url">Edit</a>
                </Button>
            </div>
        </AppLayout>
    </template>
