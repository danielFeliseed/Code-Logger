<script setup>
import { Link } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import {usePage } from '@inertiajs/vue3'
import { defineProps } from 'vue'
import { Inertia } from '@inertiajs/inertia'




const page = usePage();

const props = defineProps({
    user: Object,
    decks: Array,
});

const deleteDeck = (deckId) => {
    Inertia.delete(route('deck.destroy', deckId), {
        onSuccess: () => {
            console.log("Deck deleted");
        },
        onError: () => {
            console.log(form.errors);
        }
    })
}

const decks = props.decks;
const showToolTip = false;

console.log(page.props);
</script>

<template >

<AuthenticatedLayout>
<div class="mt-5"></div>
    <Link href="/dashboard" class=" button border text-center md:self-start rounded-lg px-2 bg-zinc-950 hover:bg-slate-900 text-white ml-3 py-2 w-48 whitespace-nowrap">Back to Card Creator</Link>
    <div class="grid grid-cols-3">
        <div v-for="deck in decks" :key="deck.id"  class=" flex flex-col">
            <div  class="flex flex-col md:grid md:grid-cols-3 items-center mx-auto mt-5">
                <div  class="flex flex-col md:grid md:grid-cols-3 gap-10 mt-10 ml-10"> 
                    <Link :href="'/decks/' + deck.id" :style="{backgroundColor: deck.color}" class=" flex flex-col border-2 border-white bg-${deck.color} hover:shadow-2xl rounded-md hover:bg-black w-[300px] h-[300px] text-center flex items-center justify-center">
                        <span class=" text-2xl font-semibold text-gray-500">{{ deck.name }}</span>
                    </Link>
                </div>
            </div>
            <button @click="deleteDeck(deck.id)" class="text-gray-200 text-center self-center justify-center mr-6 border bg-slate-800 px-2 py-1 w-1/3 mt-3 rounded-md">Delete</button>
            
        </div>
    </div>
    
    </AuthenticatedLayout>

</template>

