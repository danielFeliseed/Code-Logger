<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
    user: Object
});

</script>

<template>
    <AuthenticatedLayout>
        <h1>{{ user.name }}</h1>
    </AuthenticatedLayout>
</template>