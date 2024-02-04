<script setup>
import { ref} from 'vue';
import {useForm} from '@inertiajs/vue3';
let dropdownHidden = ref(true);
let editMode = ref(false);

const props = defineProps({
    post: Object,
    comment: Object
});

const form = useForm({
    body: props.post.body
});

// route("posts.destroy", post.id.value) -> /posts/138

const toggleEdit = () => {
    editMode.value = !editMode.value;
};

const update = () => {
    form.put(route("posts.update", props.post.id), {
        onSuccess: () => {
            console.log("Post updated");
            editMode.value = false;
        }
    });
};

const deletePost = () => {
    form.delete(route("posts.destroy", props.post.id), {
        onSuccess: () => {
            console.log("Post deleted");
        }
    });
};
</script>

<template>
<div class=" flex flex-col items-center mb-3">
    <div>
        
    </div>
    <div class="flex items-start gap-2.5">
        <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="Jese image">
        <div class="flex flex-col w-full max-w-[520px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-xl dark:bg-red-800">
       <div class="flex items-center space-x-2 rtl:space-x-reverse">
            <a :href="route('users.show',post.user.id)" class="text-sm font-semibold text-gray-900 dark:text-white">
                {{ post.user.name }}
            </a>
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">{{new Date(post.created_at).toLocaleDateString()}}</span>
       </div>
       <div>
       
       <p v-if="!editMode"  class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">{{ post.body }}</p>
        <textarea v-else v-model="form.body" type="text" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-200 focus:ring-0 dark:text-black dark:placeholder-gray-400" placeholder="Write a post..." required></textarea>
        </div>
        <div v-for="comment in post.comments" :key="comment.id">
            <p   class="text-xs italic font-normal py-2.5 text-gray-900 dark:text-white">{{ comment.body }}</p>
        </div>
        <button @click="toggleEdit">Edit</button>
        <button @click="update" v-if="editMode">Save Changes</button>
        <button @click="deletePost">Delete</button>
    </div>
 </div>
</div>
</template>