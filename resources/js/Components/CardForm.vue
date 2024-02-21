<script setup>
import DeckCreateModal from '@/Components/DeckCreateModal.vue';
import {useForm, usePage} from '@inertiajs/vue3';
import { ref } from 'vue';

const form = useForm({
    front: '',
    back: '',
    deck_id: '',
});
const page = usePage();
const decks = ref(page.props.decks);
const drawerVisible = ref(false);
const modalVisible = ref(false);

const postCard = (deckId) => {
      form.deck_id = deckId;
      console.log(form.deck_id);
    form.post(route('cards.store'), {
        onSuccess: () => {
            console.log("Card posted");
            form.reset();
        },
        onError: () => {
            alert(form.errors)
            console.log(form.errors);
        }
    })
}

const toggleDrawer = () => {
   drawerVisible.value = !drawerVisible.value;
}

const toggleModal = () => {
   if(drawerVisible.value) {
      drawerVisible.value = false;
   }
   modalVisible.value = !modalVisible.value;
}

</script>

<template>
   <form>
      <div class="rounded-xl w-full p-5 bg-slate-950">
         <div class="mb-6">
            <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Front side</label>
            <textarea v-model="form.front" type="text" id="latextarea " class="block h-[200px] w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> </textarea>
         </div>
         <div class="mb-6">
            <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Back side</label>
            <textarea v-model="form.back" type="text" id="default-input" class=" h-[200px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> </textarea>
         </div>
         <div class="text-center">
                  <button @click.prevent="toggleDrawer()"
                     class="text-white bg-slate-900 hover:bg-gray-600 font-medium rounded-lg text-sm px-5 py-2.5 mb-2   focus:outline-none "
                     type="button" data-drawer-target="drawer-swipe" data-drawer-show="drawer-swipe"
                     data-drawer-placement="bottom" data-drawer-edge="true" data-drawer-edge-offset="bottom-[60px]"
                     aria-controls="drawer-swipe">
                     Add card to deck
                  </button>
         </div>
      </div>
      <DeckCreateModal :modalVisible="modalVisible" />
      
      <div id="drawer-swipe"
            :class="{'translate-y-full': !drawerVisible, 'fixed z-40 w-full overflow-y-auto border-t border-gray-200 rounded-t-lg dark:border-gray-700 bg-slate-950 transition-transform bottom-0 left-0 right-0': true}"
            tabindex="-1" aria-labelledby="drawer-swipe-label">
            <div class="p-4 cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700" data-drawer-toggle="drawer-swipe">
               <span
                  class="absolute w-8 h-1 -translate-x-1/2 bg-gray-300 rounded-lg top-3 left-1/2 dark:bg-gray-600"></span>
               <button id="drawer-swipe-label"
                  @click.prevent="toggleModal()"
                     class="inline-flex items-center text-base text-gray-500 dark:text-gray-400 font-medium"><svg
                     class="w-4 h-4 me-2"  xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                     viewBox="0 0 18 18">
                     <path
                        d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10ZM17 13h-2v-2a1 1 0 0 0-2 0v2h-2a1 1 0 0 0 0 2h2v2a1 1 0 0 0 2 0v-2h2a1 1 0 0 0 0-2Z" />
                  </svg>Create new deck</button>
            </div>
            <div  class="grid grid-cols-3 gap-4 p-4 lg:grid-cols-4">
               <div v-for="deck in decks" :key="deck.id"  class="p-4 rounded-lg cursor-pointer bg-zinc-950 hover:bg-gray-100 dark:hover:bg-gray-600 ">
                  <button  @click.prevent="postCard(deck.id)"
                     type="submit"
                     class="flex justify-center items-center p-2 mx-auto mb-2 bg-gray-200 dark:bg-gray-600 rounded-full w-[48px] h-[48px] max-w-[48px] max-h-[48px]">
                     <svg class="inline w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                           d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                           d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                     </svg>
                  </button>
                  <div class="font-medium text-center text-gray-500 dark:text-gray-400">{{ deck.name }}</div>
               </div> 
            </div>
         </div>
   </form>

</template>
