<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
    post: Object
});

</script>

<template>
    <AuthenticatedLayout>
        <h1>{{ post.body }}</h1>
    </AuthenticatedLayout>
</template>