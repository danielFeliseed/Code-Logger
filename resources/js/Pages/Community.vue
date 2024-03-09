<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { usePage } from '@inertiajs/vue3';
import { ref, watch } from 'vue';


const page = usePage();
const decks = page.props.decks;

const clickedDeck = ref(null);

function addClickedDeck(id) {
    const deck = decks.find(d => d.id == id);
    clickedDeck.value = deck;
}

watch(clickedDeck, (newValue, oldValue) => {
    console.log('clickedDeck changed:', newValue);
}, { deep: true });



</script>



<template>
    <AuthenticatedLayout>

        <div class=" text-gray-200 min-h-screen justify-center mx-5 ">

            <div class="sm:flex w-full  ">
                <div class=" flex flex-col items-center w-full lg:w-1/2 xl:w-2/3 px-4">
                    <h2 class=" text-gray-200 text-xl mt-5 mb-5">Recent Posts</h2>
                    <div class=" self-end border h-auto w-full bg-slate-950 rounded-lg mb-5">
                        <div class="flex flex-col">
                            <div class="flex ml-3 justify-between">
                                <div>
                                    <span class="mr-3 text-gray-400">Daniel Fenster</span>
                                    <span class="text-gray-400">17 hours ago</span>
                                </div>
                                <span class="mr-3 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                                    </svg>
                                </span>
                            </div>
                            <p class=" border-b pb-1 mr-5 font-semibold text-xl mt-3 ml-5 mb-3">I still can't center this damn div</p>
                            <p class="text-gray-3 mx-5 00">Here we are, in the age where technology can practically read our minds, but centering a simple block of content on a webpage is like deciphering ancient hieroglyphs. You'd think it'd be straightforward, right? Wrong. You've got your margin-auto trick, but oh wait, that only works if you deign to specify a width, because heaven forbid the div just takes a hint and centers itself. Then there's the flexbox, a beacon of hope turned maze of confusion with its justify-content and align-items—terms that sound more like yoga poses than coding syntax. And don't even get me started on the absolute positioning hack; it's like using a sledgehammer to crack a nut. It's 2023, for crying out loud. Shouldn't CSS have evolved to read our minds by now? The whole ordeal is a testament to how even the simplest tasks can be made unnecessarily complicated in the web development world.</p>
                            <div class="ml-5 border-t mt-3 pt-2 flex">
                                <button class=" mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                                    </svg>
                                    
                                </button>
                                <span class=" text-xl mr-2">5</span>
                                <button class=""><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat-right-text" viewBox="0 0 16 16">
                                    <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                                    <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                                    </svg>
                                </button>
                                <span class="text-xl ml-2 mb-1">2</span>
                            </div>
                        </div>
                    </div>

                    <div class=" self-end border h-auto w-full bg-slate-950 rounded-lg">
                        <div class="flex flex-col">
                            <div class="flex ml-3 justify-between">
                                <div>
                                    <span class="mr-3 text-gray-400">Daniel Fenster</span>
                                    <span class="text-gray-400">17 hours ago</span>
                                </div>
                                <span class="mr-3 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                                    </svg>
                                </span>
                            </div>
                            <p class=" border-b pb-1 mr-5 font-semibold text-xl mt-3 ml-5 mb-3">I still can't center this damn div</p>
                            <p class="text-gray-3 mx-5 00">Here we are, in the age where technology can practically read our minds, but centering a simple block of content on a webpage is like deciphering ancient hieroglyphs. You'd think it'd be straightforward, right? Wrong. You've got your margin-auto trick, but oh wait, that only works if you deign to specify a width, because heaven forbid the div just takes a hint and centers itself. Then there's the flexbox, a beacon of hope turned maze of confusion with its justify-content and align-items—terms that sound more like yoga poses than coding syntax. And don't even get me started on the absolute positioning hack; it's like using a sledgehammer to crack a nut. It's 2023, for crying out loud. Shouldn't CSS have evolved to read our minds by now? The whole ordeal is a testament to how even the simplest tasks can be made unnecessarily complicated in the web development world.</p>
                            <div class="ml-5 border-t mt-3 pt-2 flex">
                                <button class=" mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                                    </svg>
                                    
                                </button>
                                <span class=" text-xl mr-2">5</span>
                                <button class=""><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat-right-text" viewBox="0 0 16 16">
                                    <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                                    <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                                    </svg>
                                </button>
                                <span class="text-xl ml-2 mb-1">2</span>
                            </div>
                        </div>
                    </div>
                </div>

                <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
                    <div class="modal-box sm:max-h-[550px]">
                        <h3 class="font-bold text-lg mt-3">{{ clickedDeck?.name }}</h3>
                        <div class=" flex flex-col items-center gap-2">
                            <p class=" font-semibold">{{ clickedDeck?.description }}</p>
                            <p class="font-semibold">Example cards from {{ clickedDeck?.name }}</p>
                            <div v-if="clickedDeck?.cards.length > 0" v-for="card in clickedDeck?.cards.slice(0, 2)"
                                class="border rounded-md px-2 py-2 self-start w-full">{{ card.front }} <br>{{ card.back
                                }}</div>
                            <div v-else
                                class=" border-t pt-3 self-center mt-5 text-center w-full font-semibold text-xl">There
                                are no cards in this deck</div>
                        </div>
                        <div class="modal-action flex justify-center items-center">
                            <form method="dialog">
                                <button class="btn mr-2">Add deck</button>
                                <button class="btn self-center">Close</button>
                            </form>
                        </div>
                    </div>
                </dialog>
                <div class=" lg:flex flex-col w-1/2 xl:w-1/3 px-4">
                    <h2 class=" text-gray-200 text-xl mt-5 mb-3 self-end mr-14">Decks Shared by Others</h2>
                    <div
                        class="carousel max-h-[700px] carousel-vertical max-w-3xl p-4 bg-slate-950 rounded-box flex flex-col self-end items-center gap-3">
                        <div v-for="deck in decks" :key="deck.id" class="carousel-item">
                            <div :style="{ backgroundColor: deck.color }"
                                class=" rounded-box text-center hover:shadow-2xl hover: flex flex-col gap-14 border border-base-content shadow-md h-56 w-[300px] bg-base-100">
                                <div class="flex justify-between">
                                    <span class="mt-1 self-start mx-2">Daniel Fenster</span>
                                    <button @click="addClickedDeck(deck.id)" onclick="my_modal_5.showModal()"
                                        class=" hover:bg-black mr-2 px-1 py-1 rounded-md mt-2 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                            class="bi bi-info-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                            <path
                                                d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                                        </svg>
                                    </button>
                                </div>
                                <span class=" self-center text-center justify-center font-extrabold text-3xl">{{ deck.name
                                    }}</span>
                                <div class="flex flex-row justify-between border-t px-2 py-1">
                                    <span class="flex gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-clock-history mt-1" viewBox="0 0 16 16">
                                            <path
                                                d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z" />
                                            <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z" />
                                            <path
                                                d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5" />
                                        </svg>
                                        2 weeks ago
                                    </span>
                                    <button class="flex gap-1 text-lg ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-heart mt-2" viewBox="0 0 16 16">
                                            <path
                                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                                        </svg>
                                        3
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Posts Section -->





        </div>
    </AuthenticatedLayout>
</template>
