<script setup>
import Decks from '@/Pages/Decks.vue';
import {useForm, usePage} from '@inertiajs/vue3';

const form = useForm({
    name: '',
    color: '',
    category_id: '',
    description: ''
});
const page = usePage();

const postDeck = () => {
    if (form.name === '' || form.color === '' || form.category_id === '' || form.description === '') {
        alert("Please fill in all fields and choose ");
        return;
    }
    form.post(route('decks.store'), {
        onSuccess: () => {
            console.log("Deck posted");
            form.reset();
            
        },
        onError: () => {
            alert(form.errors)
            console.log(form.errors);
        }
    })
}


const closeModal = () => {
    const modal = document.getElementById('crud-modal')
    modal.hidden = !modal.hidden;
    
}

const props = defineProps({
    name: String,
    color: String,
    category: String,
    description: String,
    modalVisible: {
        type: Boolean,
        default: false
    }
});


</script>

<template>
<div class="flex items-center  justify-center z-50">
    <div class="absolute   bg-black backdrop-filter backdrop-blur-3xl">
<!-- Modal toggle -->

<!-- Main modal -->
<!-- <Transition :duration="550" > -->
<div v-show="modalVisible" id="crud-modal" aria-hidden="true" class="  overflow-y-auto overflow-x-hidden z-50 w-full mb-10 md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full bg-slate-900 rounded-lg border transition duration-500 ease-in-out transform hover:bg-slate-950 hover:shadow-lg z-10">
        <!-- Modal content -->
        <div class=" self-center relative p-4 w-full max-w-lg max-h-full bg-slate-900 rounded-lg border transition duration-500 ease-in-out transform hover:bg-slate-950 hover:shadow-lg ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Create New Deck
                </h3>
                <button @click="closeModal()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deck Name</label>
                        <input v-model="form.name" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Give your deck a name" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deck Color</label>
                        <input v-model="form.color" type="color" name="color" id="color" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-1 h-11 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Choose a color" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select v-model="form.category_id" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="1">Programming</option>
                            <option value="2">Languages</option>
                            <option value="3">Mental Health</option>
                            <option value="4">Cooking</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deck Description</label>
                        <textarea v-model="form.description" id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Describe your deck here"></textarea>                    
                    </div>
                </div>
                <button @click.prevent="postDeck" type="submit" class="text-white inline-flex items-center bg-slate-950 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center   dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Add new deck
                </button>
            </form>
        </div>
    </div>
</div> 
<!-- </Transition> -->
</div>

    </div>
</template>

<style>

/* .v-enter-active,
.v-leave-active {
  transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
} */
</style>