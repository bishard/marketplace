<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const form = useForm({
    title: '',
    description: '',
    price: '',
    category: '',
});

const submit = () => {
    form.post(route('listings.store'), {
        onFinish: () => form.reset('title', 'description', 'price', 'category'),
    });
};

</script>

<template>

    <Head title="Создание объявления" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Создание объявления
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg p-6">
                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel for="title" value="Заголовок" />
                            <TextInput
                                id="title"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.title"
                                autofocus
                                required
                                autocomplete="title"
                            />

                            <InputError class="mt-2" :message="form.errors.title" />
                        </div>
                        <div class="mt-4">
                            <InputLabel for="description" value="Описание" />
                            <TextInput
                                id="description"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.description"
                                required
                                autocomplete="description"
                            />

                            <InputError class="mt-2" :message="form.errors.description" />
                        </div>
                        <div class="mt-4">
                            <InputLabel for="price" value="Цена" />
                            <TextInput
                                id="price"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.price"
                                required
                                autocomplete="price"
                            />

                            <InputError class="mt-2" :message="form.errors.price" />
                        </div>
                        <div class="mt-4">
                            <InputLabel for="category" value="Категория" />
                            <TextInput
                                id="category"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.category"
                                required
                                autocomplete="category"
                            />

                            <InputError class="mt-2" :message="form.errors.category" />
                        </div>
                        <div class="mt-4">
                            <PrimaryButton class="ms-4">
                                Создать
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>

<style scoped>

</style>
