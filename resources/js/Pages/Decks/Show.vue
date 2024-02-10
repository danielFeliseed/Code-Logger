<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref } from 'vue';

let showFrontOfCard = ref(true);
let showBackOfCard = ref(false);

const flipCard = () => {
    showFrontOfCard.value = !showFrontOfCard.value;
    showBackOfCard.value = !showBackOfCard.value;
}

</script>

<template>
    <AuthenticatedLayout>
    <div class="mx-7 flex flex-col items-center justify-center min-h-screen">
       
        <transition name="slide-fade">
        <div id="front-of-card" v-show="showFrontOfCard" class="flex justify-center items-center">
            <div class="  border-2 border-b-2 border-gray-700 bg-gray-900 hover:shadow-xl hover:w-[405px] hover:h-[505px] rounded-md  w-[400px] h-[500px]">
                <div class="h-0 flex justify-between">
                    <p class=" text-gray-200 font-semibold mx-5 py-3">Card 1 of 20</p>
                    <p class=" text-gray-200 font-semibold mx-5 py-3">Time elapsed: 06</p>
                </div>
                <div class=" bg-zinc-950 border-t-2 border-b-2 mt-[60px] h-3/4 text-center flex items-center justify-center">
                    <p class=" text-gray-200">What does MVC stand for in Laravel?</p>
                </div>
                <button @click="flipCard" class=" w-1/3 text-gray-200 bg-slate-800 hover:bg-green-700 h-16 border-r-2">Easy</button>
                <button @click="flipCard" class=" w-1/3 text-gray-200 bg-slate-800 hover:bg-yellow-700 h-16 border-r-2">Medium</button>
                <button @click="flipCard" class=" w-1/3 text-gray-200 bg-slate-800 hover:bg-red-700 h-16">Hard</button>
            </div>
        </div>
        </transition>
        
        <transition name="slide-fade">
        <div v-show="showBackOfCard" id="back-of-card" class=" absolute justify-center items-center">
            <div class="  border-2 border-b-2 border-white bg-slate-950 hover:shadow-2xl hover:w-[405px] hover:h-[505px] rounded-md  w-[400px] h-[500px]">
                <div class="h-0 flex justify-center items-center">
                    <p class=" text-gray-200 font-semibold mx-5 mt-14 text-sm">It took you 8 seconds to answer</p>
                </div>
                <div class=" bg-zinc-950 border-t-2 border-b-2 mt-[60px] h-3/4 text-center flex items-center justify-center">
                    <p class=" text-gray-200">Model View Controller</p>
                </div>
                <button @click="flipCard" id="next-card-button" class=" w-full text-gray-200 bg-slate-800 h-16 border-r-2">Next card</button>
            </div>
        </div>
        </transition>
        
    </div>
    </AuthenticatedLayout>
</template>

<style>

.slide-fade-enter-active, .slide-fade-leave-active {
  transition: all 0.3s ease;
}
.slide-fade-enter-from, .slide-fade-leave-to {
  transform: translateX(100%);
  opacity: 0;
}
.slide-fade-enter-to, .slide-fade-leave-from {
  transform: translateX(0);
  opacity: 1;
}

#next-card-button {
    background: linear-gradient(to right, #000000 50%, #010b1c 50%);
    background-size: 200% 100%;
    background-position: right bottom;
    transition: all 1s ease-out;
}

#next-card-button:hover {
    background-position: left bottom;
}


</style>