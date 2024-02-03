<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Post from '../Components/Post.vue';


const props = defineProps({
    posts: Object,
    comments: Object
});

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>
    <div class="flex flex-col">
        <div class="flex items-center justify-between w-full mb-3">
            <h2 class="text-2xl font-semibold text-gray-800">Blog posts</h2>
        </div>
        <div class=" justify-center" v-for="post in posts" :key="post.id" >
            <div v-for="comment in post.comments" :key="comment.id">
                <Post :post="post" :comment="comment"/>
            </div>
        </div>
    </div>

    </AuthenticatedLayout>
</template>
