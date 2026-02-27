<script setup lang="ts">

import { Head, Link} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps({
    listings: Object
});

</script>

<template>
    <Head title="Карточки объявлений" />
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Объявления
                </h2>
                <Link :href="route('listings.create')" class="bg-blue-500 text-black px-4 py-2 rounded">
                    Создать
                </Link>
            </div>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div v-for="listing in listings.data" :key="listing.id">
                    <div class="mt-4 border">
                        <Link :href="route('listings.show', listing.id)">
                            {{ listing.title }}
                        </Link>
                        <p>{{listing.price}}</p>
                        <p>{{listing.category.name}}</p>
                        <p>{{listing.user.name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
