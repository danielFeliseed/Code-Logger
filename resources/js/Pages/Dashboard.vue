<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import Post from '../Components/Post.vue';
import StatusCommentBox from '../Components/StatusCommentBox.vue';
import hljs from 'highlight.js';
import CodeEditor from 'simple-code-editor';


const props = defineProps({
    posts: Array,
    user: Object,
    CodeEditor: Object
});

</script>

<template>
    <Head title="Home" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Home</h2>
        </template>
        <div class="flex flex-col">
           
            <div class=" items-center justify-center flex flex-col mt-7">
                <CodeEditor value="Type the code you want to add as an Anki card here" width="70%" height="500px" class="" :line-nums="true" :tab-spaces="4" :lang-list-display="true" :languages="[['JavaScript'],['cpp', 'C++'],['python', 'Python'],['php', 'PHP']]" />
                <button type="button" class=" w-56 mt-1 text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Add to deck</button>

            </div>
            <!-- <div class=" justify-center" v-for="post in posts" :key="post.id">
                <Post :post="post" :user="user" />

            </div> -->
        </div>

    </AuthenticatedLayout>
</template>
