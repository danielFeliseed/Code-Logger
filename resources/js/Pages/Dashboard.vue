<script setup>
import StatsGraph from '../Components/StatsGraph.vue';
import CardForm from '../Components/CardForm.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
   user: Object,

});

let cardsStudiedToday = 7;
let cardsNotStudiedToday = 3;
let cardsAddedToday = 2;




</script>

<template>
  

  <AuthenticatedLayout>

      <div class=" w-full flex flex-col items-center md:items-stretch md:mx-8">

         <div class=" w-full flex flex-col md:flex-row items-center justify-center md:flex mt-7 gap-5 h-full">
            <!--TODO: Fix the issue where the Create deck modal only opens once without reloading-->
            <CardForm class=" w-3/4 md:w-1/2 mb-5 md:mb-0" />
            <StatsGraph :cardsStudiedToday="cardsStudiedToday" :cardsNotStudiedToday="cardsNotStudiedToday" :cardsAddedToday="cardsAddedToday" class="" />
         </div>
         

         
      </div>

   </AuthenticatedLayout>


</template>

