<script setup lang="ts">
import { Head, Form, useForm } from '@inertiajs/vue3';

import { store } from '@/actions/App/Http/Controllers/TaskStatusController'
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AppLayout from '@/layouts/AppLayout.vue';
import { index, create } from '@/routes/status';
import { type BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Statuses',
        href: index().url,
    },
    {
        title: 'Create',
        href: create().url,
    },
];

const form = useForm({
    title: '',
});

const submit = () => {
    form.post(store().url);
};
</script>

<template>
    <Head title="Create Task Status" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
            <div class="flex justify-between items-start">
                <h1>Create Task Status</h1>
                <Button as-child>
                    <a :href="index().url">Cancel</a>
                </Button>
            </div>
            <Form class="flex flex-col gap-6 w-full max-w-lg mx-auto" @submit.prevent="submit">
                <div class="grid gap-6">
                    <div class="grid gap-2">
                        <Label for="title">Title</Label>
                        <Input id="title" name="title" required autofocus placeholder="Active" v-model="form.title" />
                    </div>
                    <Button type="submit" class="mt-4 w-full">Add Status</Button>
                </div>
            </Form>
        </div>
    </AppLayout>
</template>
