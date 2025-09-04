<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import Label from '@/components/ui/label/Label.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head, router } from '@inertiajs/vue3';

import { ref } from 'vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
];

defineProps<{
    name?: string;
    userData: any;
}>();



const tahvelCookie = ref<string>()

const saveTahvelCookie = () => {
    router.put('/save.tahvel-cookie', {
        tahvel_cookie: tahvelCookie.value,
    });
};
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
            <div>
                <div class="">
                <Label>Tahvel auth cookie</Label>
                <Textarea class="mt-1" v-model="tahvelCookie"></Textarea>
                <p class="text-xs text-destructive" v-show="$page.props.errors.tahvel_cookie">
                    {{ $page.props.errors.tahvel_cookie }}
                </p>
            </div>
            <Button @click="saveTahvelCookie" class="max-w-min">save</Button>
        </div>
            <pre>{{ userData }}</pre>
            <pre> {{  }}</pre>
        </div>
    </AppLayout>
</template>
