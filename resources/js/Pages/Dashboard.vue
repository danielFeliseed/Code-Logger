<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import Post from '../Components/Post.vue';
import StatusCommentBox from '../Components/StatusCommentBox.vue';
import { ref } from 'vue';


const props = defineProps({
    posts: Object,
    comments: Object
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
        <StatusCommentBox :posts="posts" :comments="comments"/>
        </div>
        <div class=" justify-center" v-for="post in posts" :key="post.id" >
            <div v-for="comment in post.comments" :key="comment.id">
                <Post :post="post" :comment="comment"/>
            </div>
        </div>
       
    </div>

    </AuthenticatedLayout>
</template>
