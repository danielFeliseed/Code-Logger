<script setup>
import StatsGraph from '../Components/StatsGraph.vue';
import CardForm from '../Components/CardForm.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
   user: Object,
});




</script>

<template>
  

  <AuthenticatedLayout>

      <div class=" w-full flex flex-col items-center md:items-stretch md:mx-8">

         <div class=" w-full flex flex-col md:flex-row items-center justify-center md:flex mt-7 gap-5">
            <!--TODO: Fix the issue where the Create deck modal only opens once without reloading-->
            <CardForm class=" w-3/4 md:w-1/2 mb-5 md:mb-0" />
            <StatsGraph class="" />
         </div>
         

         
      </div>

   </AuthenticatedLayout>


</template>

