<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head,useForm } from '@inertiajs/vue3';
import example from '@/Pages/example.vue';

defineProps({
    lists: Array,
    todos: Array
})

const form = useForm({
    name: ''
});

const form2 = useForm({
    id: ''
});

const submit = () => {
    form.post(route('store'),{
        onSuccess: () => form.reset(),
    });
};

const submit2 = () => {
    form2.post(route('seelist'));
};

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                    <!--<div class="p-6 text-gray-900 dark:text-gray-100" v-for="list in lists">{{ list.name }}</div>-->
                    <form @submit.prevent="submit2" v-for="list in lists">
                        <PrimaryButton id="id" v-model="form2.id" class="p-6 text-gray-900 dark:text-gray-100" >{{ list.id }}</PrimaryButton>
                        <PrimaryButton class="p-6 text-gray-900 dark:text-gray-100" >{{ list.name }}</PrimaryButton>
                    </form>

                    <form @submit.prevent="submit">
                            <InputLabel for="name" value="Nombre" />

                            <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required
                                autofocus />

                            <InputError class="mt-2" :message="form.errors.name" />

                            <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">
                                Crear
                            </PrimaryButton>
                        </form>

                        <example :todos/>
                </div>

            </div>
        </div>

    </AuthenticatedLayout>



</template>
