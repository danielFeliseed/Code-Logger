<script setup>
import { ref} from 'vue';
let dropdownHidden = ref(true);

defineProps({
    post: Object,
    comment: Object
});
</script>

<template>
<div class=" flex flex-col items-center mb-3">
    <div>
        
    </div>
    <div class="flex items-start gap-2.5">
        <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="Jese image">
        <div class="flex flex-col w-full max-w-[520px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-xl dark:bg-red-800">
       <div class="flex items-center space-x-2 rtl:space-x-reverse">
          <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ post.user.name }}</span>
          <span class="text-sm font-normal text-gray-500 dark:text-gray-400">{{new Date(post.created_at).toLocaleDateString()}}</span>
       </div>
       <div>
       
       <p  class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">{{ post.body }}</p>
       
        </div>
        <div>
            <p class=" text-white">{{ comment.body }}</p>
        </div>
    </div>
 </div>
</div>
</template>