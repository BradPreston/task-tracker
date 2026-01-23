<script setup lang="ts">
    import { Head, Form, useForm } from '@inertiajs/vue3';

    import { store } from '@/actions/App/Http/Controllers/CompanyController'
    import { Button } from '@/components/ui/button';
    import { Input } from '@/components/ui/input';
    import { Label } from '@/components/ui/label';
    import AppLayout from '@/layouts/AppLayout.vue';
    import { type BreadcrumbItem } from '@/types';

    import { index, create } from '@/routes/companies';

    const breadcrumbs: BreadcrumbItem[] = [
        {
            title: 'Companies',
            href: index().url,
        },
        {
            title: 'Create',
            href: create().url,
        },
    ];

    const form = useForm({
        name: '',
        website: '',
    });

    const submit = () => {
        form.post(store().url);
    };
    </script>

    <template>
        <Head title="Create Company" />

        <AppLayout :breadcrumbs="breadcrumbs">
            <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
                <div class="flex justify-between items-start">
                    <h1>Create Company</h1>
                    <Button as-child>
                        <a :href="index().url">Cancel</a>
                    </Button>
                </div>
                <Form class="flex flex-col gap-6 w-full max-w-lg mx-auto" @submit.prevent="submit">
                    <div class="grid gap-6">
                        <div class="grid gap-2">
                            <Label for="name">Name</Label>
                            <Input id="name" name="name" required autofocus placeholder="Company Name" v-model="form.name" />
                        </div>
                        <div class="grid gap-2">
                            <Label for="website">Website</Label>
                            <Input id="website" name="website" type="url" required autofocus placeholder="https://example.com" v-model="form.website" />
                        </div>
                        <Button type="submit" class="mt-4 w-full">Add Company</Button>
                    </div>
                </Form>
            </div>
        </AppLayout>
    </template>
