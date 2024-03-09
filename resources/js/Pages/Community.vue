<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { usePage } from '@inertiajs/vue3';


const page = usePage();
const decks = page.props.decks;
console.log(page.props);
console.log(decks);

</script>



<template>
    <AuthenticatedLayout>
        
    <!-- I want to have a Layout where the shared decks are in a carousel-->
    <!-- And below the posts that are not shared decks are below that (eventually i want to have a real code editor for the posts)-->
    <div class=" text-gray-200 min-h-screen flex flex-col items-center ">

        <h2 class=" text-gray-200 text-xl mt-5 mb-3">Decks Shared by Others</h2>
        <div class="carousel carousel-center max-w-3xl p-4 bg-slate-900 space-x-4 rounded-box">
            <div v-for="deck in decks" class="carousel-item">
                <div :style="{backgroundColor: deck.color}"  class=" rounded-box text-center hover:shadow-2xl hover: flex flex-col gap-14 border border-base-content shadow-md h-56 w-[300px] bg-base-100">
                    <span class="mt-1 self-start mx-2">Daniel Fenster</span>
                    <span class=" self-center text-center justify-center font-extrabold text-3xl">{{ deck.name }}</span>
                    <div class="flex flex-row justify-between border-t px-2 py-1">
                        <span class="flex gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-history mt-1" viewBox="0 0 16 16">
                            <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z"/>
                            <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z"/>
                            <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5"/>
                            </svg>
                            2 weeks ago
                        </span>
                        <button class="flex gap-1 text-lg ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart mt-2" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                            </svg>
                            3
                        </button>
                    </div>
                </div>
            </div> 
            <!-- <div class="carousel-item">
                <img src="https://daisyui.com/images/stock/photo-1565098772267-60af42b81ef2.jpg" class="rounded-box" />
            </div> 
            <div class="carousel-item">
                <img src="https://daisyui.com/images/stock/photo-1572635148818-ef6fd45eb394.jpg" class="rounded-box" />
            </div> 
            <div class="carousel-item">
                <img src="https://daisyui.com/images/stock/photo-1494253109108-2e30c049369b.jpg" class="rounded-box" />
            </div> 
            <div class="carousel-item">
                <img src="https://daisyui.com/images/stock/photo-1550258987-190a2d41a8ba.jpg" class="rounded-box" />
            </div> 
            <div class="carousel-item">
                <img src="https://daisyui.com/images/stock/photo-1559181567-c3190ca9959b.jpg" class="rounded-box" />
            </div> 
            <div class="carousel-item">
                <img src="https://daisyui.com/images/stock/photo-1601004890684-d8cbf643f5f2.jpg" class="rounded-box" />
            </div> -->
        </div>

      <!-- Posts Section -->
      <div class="max-w-4xl mx-auto p-4">
        <div class="mb-8">
          <!-- New Post Form -->
          <div class="mb-6">
            <textarea v-model="newPostContent" class="w-full p-2 bg-gray-800 text-gray-200" placeholder="Share something..."></textarea>
            <button @click="submitPost" class="mt-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded">Post</button>
          </div>
          <!-- Post List -->
          <div v-for="(post, index) in posts" :key="index" class="mb-4 p-4 bg-gray-800 rounded">
            <div class="font-bold">{{ post.user.name }} <span class="text-sm text-gray-400">{{ post.createdAt }}</span></div>
            <p class="mt-2">{{ post.content }}</p>
            <!-- Comments -->
            <div v-for="comment in post.comments" :key="comment.id" class="ml-4 mt-4 border-l-2 border-blue-500 pl-2">
              <div class="text-sm">{{ comment.user.name }} <span class="text-xs text-gray-400">{{ comment.createdAt }}</span></div>
              <p class="text-sm mt-1">{{ comment.content }}</p>
            </div>
            <!-- Add Comment Form -->
            <div class="mt-4">
              <textarea v-model="commentContent" class="w-full p-2 bg-gray-700 text-gray-200 text-sm" placeholder="Add a comment..."></textarea>
              <button @click="submitComment(post)" class="mt-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded text-sm">Comment</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    </AuthenticatedLayout>
  </template>


