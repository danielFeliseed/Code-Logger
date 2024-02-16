<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import Post from '../Components/Post.vue';
import StatusCommentBox from '../Components/StatusCommentBox.vue';
import hljs from 'highlight.js';
import CodeEditor from 'simple-code-editor';
import StatsGraph from '../Components/StatsGraph.vue';
import CardForm from '../Components/CardForm.vue';


const props = defineProps({
   user: Object,
});




</script>

<template>
   <Head title="Home" />

   <AuthenticatedLayout>

      <div class=" flex flex-col mx-8">

         <div class=" items-center justify-center flex mt-7 gap-5">
            <!-- <CodeEditor value="Type the code you want to add as an Anki card here" width="70%" height="500px"
               class="code-editor" :line-nums="true" :tab-spaces="4" :lang-list-display="true"
               :languages="[['JavaScript'], ['cpp', 'C++'], ['python', 'Python'], ['php', 'PHP']]" /> -->
            <CardForm class=" w-1/2" />
            <StatsGraph />
         </div>
         

         
      </div>

</AuthenticatedLayout>
</template>

