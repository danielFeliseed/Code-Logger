<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {useForm} from '@inertiajs/vue3';

let props = defineProps({
    user: Object,
    posts: Array,
    comments: Array
});

console.log(props);

</script>

<template>
    <AuthenticatedLayout>
        

        <div class="flex flex-wrap w-full mt-5 ml-5">
            <div class="flex flex-col mr-5 text-center mb-11 lg:mr-16">
              <div class="inline-block mb-4 relative shrink-0 rounded-[.95rem]">
                <img class="inline-block shrink-0 rounded-[.95rem] w-[150px] h-[150px]" src="https://raw.githubusercontent.com/Loopple/loopple-public-assets/main/riva-dashboard-tailwind/img/avatars/avatar11.jpg" alt="avarat image">
              </div>
              <div class="text-center">
                <a href="javascript:void(0)" class="text-dark font-semibold hover:text-primary text-[1.25rem] transition-colors duration-200 ease-in-out">{{ user.name }}</a>
                <span class="block font-medium text-muted">Joined on {{ new Date(user.created_at).toLocaleDateString() }}</span>
              </div>
            </div>
        </div>

       
<div class=" flex flex-col items-center">
    <div v-for="post in props.posts" class="flex items-start gap-2.5 mb-5">
        <img class="w-16 h-16 rounded-full" src="/Dadlettuce.jpeg" alt="Jese image">
        <div class="flex flex-col w-full max-w-[520px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-xl dark:bg-red-800">
       <div class="flex items-center space-x-2 rtl:space-x-reverse">
            <a :href="route('users.show', props.user.id)" class="text-sm font-semibold text-gray-900 dark:text-white">
                {{ props.user.name }}
            </a>
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">{{post.created_at}}</span>
       </div>
       <div>
       
       <p  class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">{{ post.body }}</p>
       
        </div>
        <div v-for="comment in post.comments " class="border rounded-md px-2 mt-3">
            <p   class="text-xs italic font-normal py-2.5 text-gray-900 dark:text-white">{{ comment.body }}</p>
        </div> 
        <!-- <button @click="toggleEdit">Edit</button>
        <button @click="update" v-if="editMode">Save Changes</button>
        <button @click="deletePost">Delete</button> -->
    </div>
 </div>
</div>


    </AuthenticatedLayout>
</template>