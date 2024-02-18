<script setup>
import { Link } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import {usePage } from '@inertiajs/vue3'
import { defineProps, ref } from 'vue'
import { Inertia } from '@inertiajs/inertia'




const page = usePage();

const props = defineProps({
    user: Object,
    decks: Array,
});

const deleteDeck = (deckIdToDelete) => {
    Inertia.delete(route('deck.destroy', deckIdToDelete), {
        onSuccess: () => {
            console.log("Deck deleted");
            toggleDeleteModal();
        },
        onError: () => {
            console.log(form.errors);
        }
    })
}

const decks = props.decks;

let deckIdToDelete = ref(null);
let showDeleteModal = ref(false);
const toggleDeleteModal = (id = null) => {
    deckIdToDelete.value = id;
    showDeleteModal.value = !showDeleteModal.value;
}

console.log(page.props);
</script>

<template >

<AuthenticatedLayout>
<div class="mt-5"></div>
    <Link href="/dashboard" class=" button border text-center md:self-start rounded-lg px-2 bg-zinc-950 hover:bg-slate-900 text-white ml-3 py-2 w-48 whitespace-nowrap">Back to Card Creator</Link>
    <div class="grid grid-cols-3">
        <div v-for="deck in decks" :key="deck.id"  class="mt-16 flex flex-col items-center justify-center">
            
            <div  class="stack"> 
                <!-- <Link :href="'/decks/' + deck.id" :style="{backgroundColor: deck.color}" class="text-center border border-base-content shadow-md card w-[300px] bg-base-100">
                    <span class=" card-body text-2xl font-semibold text-gray-500">{{ deck.name }}</span>
                </Link> -->
                <Link :href="'/decks/' + deck.id" :style="{backgroundColor: deck.color}"  class=" transform transition-transform duration-500 hover:rotate-12 text-center hover:shadow-2xl hover: flex items-center justify-center border border-base-content shadow-md card h-56 w-[300px] bg-base-100">
                    <span class=" self-center text-center justify-center card-body font-extrabold text-3xl">{{ deck.name }}</span>
                </Link>
                <Link :href="'/decks/' + deck.id" class="text-center border border-base-content shadow card h-56 w-[300px] bg-base-100">
                    <span class=" card-body">2</span>
                </Link>
                <Link :href="'/decks/' + deck.id"  class="text-center border border-base-content shadow-sm card h-56 w-[300px] bg-base-100">
                     <span class=" card-body">3</span>
                </Link>
            </div>
            
            <button @click="toggleDeleteModal(deck.id)" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="text-gray-200 hover:bg-red-800 text-center border mx-auto bg-slate-800 px-2 py-1 w-1/3  mt-5 rounded-md">Delete</button>
        </div>
            <!-- Delete Modal -->
            <Transition :duration="550" />
            <div v-show="showDeleteModal" id="popup-modal" tabindex="-3" class="flex overflow-y-auto overflow-x-hidden absolute z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class=" p-4 w-full max-w-md max-h-full ">
                    <div class="relative rounded-lg shadow dark:bg-gray-700">
                        <button @click="toggleDeleteModal()"  type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                            <button @click="deleteDeck(deckIdToDelete)" data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Yes, I'm sure
                            </button>
                            <button @click="toggleDeleteModal()"  data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                     </div>
                </div>
            </div>
            <Transition />
     </div>
</div>
    
    </AuthenticatedLayout>

</template>

<style>

.v-enter-active,
.v-leave-active {
  transition: opacity 0.6s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}

</style>
