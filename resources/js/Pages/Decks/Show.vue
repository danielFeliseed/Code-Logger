<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { Link } from '@inertiajs/inertia-vue3';


const page = usePage();
const cards = ref(page.props.cards);
const deckName = ref(page.props.deck.name);
const cardDisplays = ref(true);

let showFrontOfCard = ref(true);
let showBackOfCard = ref(false);
let currentCard = ref(0);
let showCompletionMessage = ref(false);
let toggleCards = ref(false);
let toggleReviewButton = ref(true);
let timer = ref(null);
let secondsTaken = ref(0);
let showCardDetails = ref(false);
let cardDetailsToBeShown = ref(
    {
        front: '',
        back: '',
        id: '',
    }
);

function toggleCardsAndReviewButton() {
    toggleCards.value = !toggleCards.value;
    toggleReviewButton.value = !toggleReviewButton.value;
    cardDisplays.value = !cardDisplays.value;
    startTimer();
}

function toggleCardDetails(card = null) {
    cardDetailsToBeShown.value = {
        front: card.front,
        back: card.back,
        id: card.id,
    }
    showCardDetails.value = !showCardDetails.value;

}

const flipCard = () => {
    showFrontOfCard.value = !showFrontOfCard.value;
    showBackOfCard.value = !showBackOfCard.value;
    if (showBackOfCard.value) {
        stopTimer();
    } else {
        startTimer();
    }
}

const goToNextCard = () => {

    stopTimer();
    if (currentCard.value < cards.value.length -1) {
        showFrontOfCard.value = !showFrontOfCard.value;
        showBackOfCard.value = !showBackOfCard.value;
        currentCard.value++;
        startTimer();
    } else {
        toggleCards.value = !toggleCards.value;
        showCompletionMessage.value = !showCompletionMessage.value;
    }
}

const startTimer = () => {
    secondsTaken.value = 0;
    timer.value = setInterval(() => {
        secondsTaken.value++;
    }, 1000);
}

const stopTimer = () => {
    clearInterval(timer.value);
}


</script>

<template>
    <AuthenticatedLayout>
    
    <div class="mx-10 ">
        <div class=" flex justify-between mt-5 ">
            <Link href="./" class="text-gray-200 text-2xl hover:text-gray-400">Cards in {{ deckName }}</Link>
            <button v-if="cards.length !== 0" v-show="toggleReviewButton" @click="toggleCardsAndReviewButton()" class=" bg-slate-950 hover:bg-black rounded py-1 px-5 text-gray-200">Review cards</button>
        </div>
        <div v-if="cards.length == 0" class="flex flex-col justify-center items-center ">
            <h1 class="text-3xl text-gray-200 self-center justify-center text-center mt-28">No cards in this deck. <br> You can create them with the <Link href="/dashboard" class=" underline text-white hover:text-gray-400 ">Card Creator</Link></h1>
        </div>
        <div v-else class=" flex flex-col lg:grid lg:grid-cols-3 justify-center items-center">
            <ul v-show="cardDisplays" v-for="card in cards" :key="card.id">
                <li class=" bg-slate-950 hover:bg-black text-white text-center border rounded-lg rounded-b-none p-2 mt-7 pt-10 w-[300px] h-32" >{{ card.front }}</li>
                <button @click="toggleCardDetails(card)" class="text-white border bg-slate-800 hover:bg-black px-1 rounded-b-sm w-[150px]">Details</button>
                <button class="text-white border bg-slate-800 hover:bg-red-800 px-1 rounded-b-sm w-[150px]">Delete</button>
            </ul>
        </div>
        <!--Completion Message Modal-->
        <div v-show="showCompletionMessage" class=" flex justify-center mt-16">
            <div class=" flex flex-col gap-4 border rounded-lg items-center pt-10 pb-5 px-10 text-center bg-slate-950 w-[450px]" >
                <h1 class="text-3xl text-gray-200">You have completed the review, Great job!</h1>
                <Link href="/dashboard" class="text-white border bg-slate-800 hover:bg-black px-1 mt-3 rounded-lg w-[150px]">Back to dashboard</Link>
            </div>
        </div>
    
        <!--Card Details Modal-->
        <Transition :duration="{enter: 550, leave:550}" >
        <div v-show="showCardDetails" id="card-details" class=" z-50 absolute top-20 right-0 left-0 flex justify-center mt-16">
            <div  class=" flex flex-col gap-4 border rounded-lg items-center pt-10 pb-5 px-10 text-center bg-slate-950 sm:w-[450px]" >
                <h1 class="text-3xl text-gray-200">Card details</h1>
                <label class=" text-gray-200 font-semibold text-lg" for="card-front">Front of card</label>
                <div class=" text-gray-200 sm:w-[400px] border rounded-lg py-3 px-3 bg-black" style="white-space: pre-wrap;">
                    {{ cardDetailsToBeShown.front }}
                </div>
                <label class="text-gray-200 font-semibold text-lg" for="card-back">Back of card</label>
                <div class=" text-gray-200  sm:w-[400px] border rounded-lg py-3 px-3 text-left bg-black" style="white-space: pre-wrap;">
                    {{ cardDetailsToBeShown.back }}
                </div>
                <div>
                    <button @click="toggleCardDetails" class="text-white border bg-slate-800 hover:bg-black px-1 mt-3 rounded-lg w-[150px]">Close</button>
                </div>
            </div>
        </div>
        </Transition>

        <!--Review Cards Modal-->
        <div id="review-modal"  class="  mx-7 flex flex-col items-center justify-center">
            <div v-show="toggleCards" class="">
                <transition name="slide-fade" position: absolute
                :duration="{enter: 1000, leave: 650 }"> 
               
                <!--Front of card-->
                <div id="front-of-card" v-show="showFrontOfCard" class="flex justify-center items-center mt-16">
                    <div class="  border-2 border-b-2 border-gray-700 bg-gray-900 hover:shadow-xl rounded-md w-72  sm:w-[400px] h-[500px]">
                        <div class="h-0 flex justify-between">
                            <p class=" text-gray-200 font-semibold mx-5 py-3">Card {{ currentCard + 1 }} of {{ cards.length }}</p>
                            <p class=" text-gray-200 font-semibold mx-5 py-3">Time elapsed: {{ secondsTaken }}</p>
                        </div>
                        <div class=" bg-zinc-950 border-t-2 border-b-2 mt-[60px] h-3/4 text-center flex items-center justify-center">
                            <p class=" text-gray-200">{{ cards[currentCard]?.front }}</p>
                        </div>
                        <button @click="flipCard" class=" w-full text-gray-200 bg-slate-800 hover:bg-gray-950 h-16">See Answer</button>
                    </div>
                </div>
                </transition>
                
                 <transition name="slide-fade" position: absolute> 
                <!--Back of card-->
                <div  v-show="showBackOfCard" id="back-of-card" class="flex justify-center items-center mt-16">
                    <div class="  border-2 border-b-2  bg-slate-950 hover:shadow-2xl rounded-md w-72  md:w-[400px] h-[500px]">
                        <div class="h-0 flex justify-center items-center">
                            <p class=" text-gray-200 font-semibold mx-5 mt-14 text-sm">It took you {{ secondsTaken }} seconds to answer</p>
                        </div>
                        <div class=" bg-zinc-950 border-t-2 border-b-2 mt-[60px] h-3/4 text-center flex items-center justify-center">
                            <p class=" text-gray-200">{{ cards[currentCard]?.back }}</p>
                        </div>
                        <div class="flex">
                            <button @click="goToNextCard" id="next-card-button" class=" w-full text-gray-200 bg-slate-800 hover:bg-black h-16 border-r-2">⭕️</button>
                            <button @click="goToNextCard" id="next-card-button" class=" w-full text-gray-200 bg-slate-800 hover:bg-black h-16 border-r-2">❌</button>
                        </div>
                    </div>
                </div>
                 </transition> 
            </div>
        </div>
    </div>

    </AuthenticatedLayout>
</template>

<style>

#front-of-card, #back-of-card {
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.parent-container {
    position: relative;
}

.slide-fade-enter-active {
    transition: all 1s ease;
    position:inherit;
}

.slide-fade-leave-active {
    transition: all 1s ease;
    position: absolute;
}

.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
    transform: translateX(10px);
    opacity: 0;
    position: absolute;
}

.v-enter-active,
.v-leave-active {
  transition: opacity 0.6s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}

#card-details {
    @media screen and (max-width: 640px) {
        position: sticky;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1000;
        
        
    }
}

#review-modal {
    @media screen and (max-width: 640px) {
        
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1000;
       
        
        
    }
    z-index: 1000;
}


/* #next-card-button {
    background: linear-gradient(to right, #2b2b2b 50%, #030016 50%);
    background-size: 200% 100%;
    background-position: right bottom;
    transition: all 1s ease-out;
}

#next-card-button:hover {
    background-position: left bottom;
} */


</style>