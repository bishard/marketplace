<script setup lang="ts">
import {Head, Link, usePage} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    listing: Object
});

const page = usePage();

const deleteListing = () => {
    if (confirm('Удалить объявление?')) {
        router.delete(route('listings.destroy', props.listing.id));
    }
};

</script>

<template>
    <Head title="Карточка объявления" />
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Карточка объявления
                </h2>
                <Link :href="route('listings.create')" class="bg-blue-500 text-black px-4 py-2 rounded">
                    Создать
                </Link>
            </div>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="mt-4 border">
                        <p>{{listing.title}}</p>
                        <p>{{listing.price}}</p>
                        <p>{{listing.category}}</p>
                        <p>{{listing.user.name}}</p>
                        <div v-if="page.props.auth.user.id == listing.user.id">
                            <Link :href="route('listings.edit', listing.id)">
                                Редактировать
                            </Link>
                            <button @click="deleteListing" class="bg-red-500 text-red-950 px-4 py-2 rounded">
                                Удалить
                            </button>
                        </div>
                    </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
