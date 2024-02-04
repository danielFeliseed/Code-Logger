<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import Post from '../Components/Post.vue';
import StatusCommentBox from '../Components/StatusCommentBox.vue';


const props = defineProps({
    posts: Array,
    user: Object
});

</script>

<template>
    <Head title="News Feed" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">News Feed</h2>
        </template>
        <div class="flex flex-col">
            <div class="flex items-center justify-between w-full mb-3">
                <h2 class="text-2xl font-semibold text-gray-800">News Feed</h2>
            </div>
            <div>
                <StatusCommentBox />
            </div>
            <div class=" justify-center" v-for="post in posts" :key="post.id">
                <Post :post="post" :user="user" />

            </div>
        </div>

    </AuthenticatedLayout>
</template>
