<script setup>
import InputLabel from '@/Components/InputLabel.vue';
defineProps({
    todos: Array
})

</script>

<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <InputLabel for="name" value="Nombre" />
                <div class="p-6 text-gray-900 dark:text-gray-100" v-for="todo in todos">{{ todo.name }}</div>
            </div>
        </div>
    </div>
</template>
