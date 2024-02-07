<script setup>
import { ref} from 'vue';
import {useForm} from '@inertiajs/vue3';
let dropdownHidden = ref(true);
let editMode = ref(false);

const props = defineProps({
    post: Object,
    comment: Object,
    user: Object
});

const form = useForm({
    // body: props.post.body,
    body: props.post.comment?.body,
    post_id: props.post.id
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

const postComment = () => {
    form.post(route("posts.comments.store", props.post.id), {
        onSuccess: () => {
            console.log("Comment posted");
            form.reset();
        }
    });
};
console.log(props)
</script>

<template>
<div class=" flex flex-col items-center mb-3">
    <div>
        
    </div>
    <div class="flex items-start gap-2.5">
        <img class="w-16 h-16 rounded-full" src="/Dadlettuce.jpeg" alt="Jese image">
        <div class="flex flex-col w-full max-w-[520px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-xl dark:bg-gray-500">
       <div class="flex items-center space-x-2 rtl:space-x-reverse">
            <a :href="route('users.show',post.user.id)" class="text-lg font-semibold text-gray-900 dark:text-white">
                {{ post.user.name }}
            </a>
            <span class="text-sm font-normal text-white ">{{ 
                 new Date(post.created_at).toLocaleDateString() + ' ' +
                 new Date(post.created_at).getHours() + ':' +
                 new Date(post.created_at).getMinutes().toString().padStart(2, '0')
            }}</span>
       </div>
       <div>
       
       <p v-if="!editMode"  class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">{{ post.body }}</p>
        <textarea v-else v-model="form.body" type="text" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-200 focus:ring-0 dark:text-black dark:placeholder-gray-400" placeholder="Write a post..." required></textarea>
        </div>
        <div v-for="comment in post.comments" :key="comment.id" class="border rounded-md px-2 mt-3">
            <span class="text-white font-semibold mr-5">{{ comment.user.name }}</span>
            <span class="text-white text-xs">{{ 
                    new Date(post.created_at).toLocaleDateString() + ' ' +
                    new Date(post.created_at).getHours() + ':' +
                    new Date(post.created_at).getMinutes().toString().padStart(2, '0')
                }}</span>
            <p   class="text-xs italic font-normal py-2.5 text-gray-900 dark:text-white">{{ comment.body }}</p>
        </div>
        <button v-if="post.user_id == user.id" @click="toggleEdit">Edit</button>
        <div class="flex flex-col border rounded-md mt-2 px-2 min-w-[500px]">
        <textarea v-model="form.body" name="postComment" id="postComment" cols="30" rows="4" class=" border-none rounded-md mt-2"></textarea>
        <button @click="postComment" class=" rounded-md mt-2 text-white border self-center w-1/4 mb-2">Comment</button>
        </div>
        <button @click="update" v-if="editMode" class="border border-white rounded-md mt-1">Save Changes</button>
        <button v-if="post.user_id == user.id" class="border border-white rounded-md mt-1" @click="deletePost">Delete</button>
    </div>
 </div>
</div>
</template>