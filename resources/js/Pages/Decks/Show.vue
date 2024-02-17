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
}

const goToNextCard = () => {
    if (currentCard.value < cards.value.length -1) {
        showFrontOfCard.value = !showFrontOfCard.value;
        showBackOfCard.value = !showBackOfCard.value;
        currentCard.value++;
    } else {
        toggleCards.value = !toggleCards.value;
        showCompletionMessage.value = !showCompletionMessage.value;
    }
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
                <li class=" bg-slate-950 hover:bg-black text-white text-center border rounded-lg rounded-b-none p-2 mt-7 pt-10 w-[300px] h-28" >{{ card.front }}</li>
                <button @click="toggleCardDetails(card)" class="text-white border bg-slate-800 hover:bg-black px-1 rounded-b-sm w-[150px]">Details</button>
                <button class="text-white border bg-slate-800 hover:bg-red-800 px-1 rounded-b-sm w-[150px]">Delete</button>
            </ul>
        </div>

        <div v-show="showCompletionMessage" class=" flex justify-center mt-16">
            <div class=" flex flex-col gap-4 border rounded-lg items-center pt-10 pb-5 px-10 text-center bg-slate-950 w-[450px]" >
                <h1 class="text-3xl text-gray-200">You have completed the review, Great job!</h1>
                <Link href="/dashboard" class="text-white border bg-slate-800 hover:bg-black px-1 mt-3 rounded-lg w-[150px]">Back to dashboard</Link>
            </div>
        </div>
    

        <div v-show="showCardDetails" class=" flex justify-center mt-16">
            <div class=" flex flex-col gap-4 border rounded-lg items-center pt-10 pb-5 px-10 text-center bg-slate-950 w-[450px]" >
                <h1 class="text-3xl text-gray-200">Card details</h1>
                <label class="text-gray-200 font-semibold text-lg" for="card-front">Front of card</label>
                <div class=" text-gray-200 w-[400px] border rounded-lg py-3 px-3 bg-black">
                    {{ cardDetailsToBeShown.front }}
                </div>
                <label class="text-gray-200 font-semibold text-lg" for="card-back">Back of card</label>
                <div class=" text-gray-200  w-[400px] border rounded-lg py-3 px-3 bg-black">
                    {{ cardDetailsToBeShown.back }}
                </div>
                <div>
                    <button @click="toggleCardDetails" class="text-white border bg-slate-800 hover:bg-black px-1 mt-3 rounded-lg w-[150px]">Close</button>
                </div>
            </div>
        </div>

        <div  class="mx-7 flex flex-col items-center justify-center">
            <div v-show="toggleCards">
                <transition name="slide-fade">
                <div id="front-of-card" v-show="showFrontOfCard" class="flex justify-center items-center mt-16">
                    <div class="  border-2 border-b-2 border-gray-700 bg-gray-900 hover:shadow-xl hover:w-[405px] hover:h-[505px] rounded-md  w-[400px] h-[500px]">
                        <div class="h-0 flex justify-between">
                            <p class=" text-gray-200 font-semibold mx-5 py-3">Card 1 of 20</p>
                            <p class=" text-gray-200 font-semibold mx-5 py-3">Time elapsed: 06</p>
                        </div>
                        <div class=" bg-zinc-950 border-t-2 border-b-2 mt-[60px] h-3/4 text-center flex items-center justify-center">
                            <p class=" text-gray-200">{{ cards[currentCard]?.front }}</p>
                        </div>
                        <button @click="flipCard" class=" w-1/3 text-gray-200 bg-slate-800 hover:bg-green-700 h-16 border-r-2">Easy</button>
                        <button @click="flipCard" class=" w-1/3 text-gray-200 bg-slate-800 hover:bg-yellow-700 h-16 border-r-2">Medium</button>
                        <button @click="flipCard" class=" w-1/3 text-gray-200 bg-slate-800 hover:bg-red-700 h-16">Hard</button>
                    </div>
                </div>
                </transition>
                
                <transition name="slide-fade">
                <div v-show="showBackOfCard" id="back-of-card" class="flex justify-center items-center mt-16">
                    <div class="  border-2 border-b-2 border-white bg-slate-950 hover:shadow-2xl hover:w-[405px] hover:h-[505px] rounded-md  w-[400px] h-[500px]">
                        <div class="h-0 flex justify-center items-center">
                            <p class=" text-gray-200 font-semibold mx-5 mt-14 text-sm">It took you 8 seconds to answer</p>
                        </div>
                        <div class=" bg-zinc-950 border-t-2 border-b-2 mt-[60px] h-3/4 text-center flex items-center justify-center">
                            <p class=" text-gray-200">{{ cards[currentCard]?.back }}</p>
                        </div>
                        <button @click="goToNextCard" id="next-card-button" class=" w-full text-gray-200 bg-slate-800 h-16 border-r-2">Next card</button>
                    </div>
                </div>
                </transition>
            </div>
        </div>
    </div>

    </AuthenticatedLayout>
</template>

<style>

.slide-fade-enter-active, .slide-fade-leave-active {
  transition: transform 0.5s ease-out, opacity 0.4s ease-out;
}
.slide-fade-enter-from, .slide-fade-leave-to {
  transform: translateY(100%);
  opacity: 0;
}
.slide-fade-enter-to, .slide-fade-leave-from {
  transform: translateY(30);
  opacity: 0.4;
}

#next-card-button {
    background: linear-gradient(to right, #2b2b2b 50%, #030016 50%);
    background-size: 200% 100%;
    background-position: right bottom;
    transition: all 1s ease-out;
}

#next-card-button:hover {
    background-position: left bottom;
}


</style>