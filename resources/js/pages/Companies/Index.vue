<script setup lang="ts">
    import { Head, router } from '@inertiajs/vue3';

    import { Button } from '@/components/ui/button';
    import AppLayout from '@/layouts/AppLayout.vue';
    import { formatDate } from '@/lib/utils';
    import { type BreadcrumbItem, type Company } from '@/types';

    // import { index, create, destroy, edit, show } from '@/routes/companies';
    import { index, create, show, edit, destroy } from '@/routes/companies';


    interface Props {
        companies: Company[];
    }

    const props = defineProps<Props>();

    const breadcrumbs: BreadcrumbItem[] = [
        {
            title: 'Companies',
            href: index().url,
        },
    ];

    // eslint-disable-next-line @typescript-eslint/no-unused-vars
    const deleteCompany = (companyId: number) => {
      if (confirm('Are you sure you want to delete this company?')) {
        router.delete(destroy({ company: companyId }).url);
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
                    <h1>Companies</h1>
                    <Button as-child>
                        <a :href="create().url">Create Company</a>
                    </Button>
                </div>
                    <table class="w-full table-auto border-collapse border border-gray-100 rounded-md overflow-hidden">
                        <thead>
                            <tr class="bg-gray-100 text-left">
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Website</th>
                                <th class="px-4 py-2">Created At</th>
                                <th class="px-4 py-2">Updated At</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="company in props.companies" :key="company.id" class="text-left">
                                <td class="px-4 py-2"><a :href="show(company.id).url">{{ company.name }}</a></td>
                                <td class="px-4 py-2">{{ company.website }}</td>
                                <td class="px-4 py-2">{{ formatDate(company.created_at) }}</td>
                                <td class="px-4 py-2">{{ formatDate(company.updated_at) }}</td>
                                <td class="px-4 py-2 flex items-center gap-2">
                                    <Button as-child>
                                        <a :href="show(company.id).url">View</a>
                                    </Button>
                                    <Button as-child>
                                        <a :href="edit(company.id).url">Edit</a>
                                    </Button>
                                    <Button variant="destructive" @click="deleteCompany(company.id)" class="cursor-pointer">
                                        Delete
                                    </Button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                        <tr class="bg-gray-100 text-left">
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Website</th>
                                <th class="px-4 py-2">Created At</th>
                                <th class="px-4 py-2">Updated At</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </tfoot>
                    </table>
            </div>
        </AppLayout>
    </template>
