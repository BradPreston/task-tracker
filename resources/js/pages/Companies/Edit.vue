<script setup lang="ts">
    import { Head, Form, useForm } from '@inertiajs/vue3';

    import { update } from '@/actions/App/Http/Controllers/CompanyController'
    import { Button } from '@/components/ui/button';
    import { Input } from '@/components/ui/input';
    import { Label } from '@/components/ui/label';
    import AppLayout from '@/layouts/AppLayout.vue';
    import { type BreadcrumbItem, type Company } from '@/types';

    import { index, edit } from '@/routes/companies';

    interface Props {
        company: Company;
    }

    const props = defineProps<Props>();

    const breadcrumbs: BreadcrumbItem[] = [
        {
            title: 'Companies',
            href: index().url,
        },
        {
            title: 'Edit',
            href: edit(props.company.id).url,
        },
    ];

    const form = useForm({
        name: props.company.name,
        website: props.company.website,
    });

    const submit = () => {
        form.put(update({ company: props.company.id }).url);
    };
    </script>

    <template>
        <Head title="Edit Company" />

        <AppLayout :breadcrumbs="breadcrumbs">
            <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
                <div class="flex justify-between items-start">
                    <h1>Edit Company</h1>
                    <Button as-child>
                        <a :href="index().url">Cancel</a>
                    </Button>
                </div>
                <Form class="flex flex-col gap-6 w-full max-w-lg mx-auto" @submit.prevent="submit">
                    <div class="grid gap-6">
                        <div class="grid gap-2">
                            <Label for="name">Name</Label>
                            <Input id="name" name="name" required autofocus v-model="form.name" placeholder="Company Name" />
                        </div>
                        <div class="grid gap-2">
                            <Label for="website">Website</Label>
                            <Input id="website" name="website" type="url" required autofocus v-model="form.website" placeholder="https://example.com" />
                        </div>
                        <Button type="submit" class="mt-4 w-full">Update Company</Button>
                    </div>
                </Form>
            </div>
        </AppLayout>
    </template>
