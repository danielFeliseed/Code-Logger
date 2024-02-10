<script setup>
import { Link } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
</script>

<template>

    <AuthenticatedLayout>

    <div class="flex flex-col items-center mx-auto mt-5">

        <Link href="/dashboard" class=" button border text-center md:self-start rounded-lg px-2 bg-zinc-950 hover:bg-slate-900 text-white ml-3 py-2 w-48 whitespace-nowrap">Back to Card Creator</Link>

        <div class="flex flex-col md:grid md:grid-cols-3 gap-10 mt-10 ml-10"> 
            <button class=" border-2 border-white bg-slate-900 hover:shadow-2xl rounded-md hover:bg-black w-[300px] h-[300px] text-center flex items-center justify-center">
                <span class=" text-2xl font-semibold text-red-700">Laravel</span>
            </button>
            <button class=" border-2 border-white bg-green-700 hover:shadow-2xl rounded-md hover:bg-black w-[300px] h-[300px] text-center flex items-center justify-center">
                <span class=" text-2xl font-semibold text-white">Vue.js</span>
            </button>
            <button class=" border-2 border-white hover:text-yellow-400 bg-yellow-400 hover:shadow-2xl rounded-md hover:bg-black  w-[300px] h-[300px] text-center flex items-center justify-center">
                <span class=" text-2xl font-semibold text-black">JavaScript</span>
            </button>
            <button class=" border-2 border-white bg-purple-950 hover:shadow-2xl rounded-md hover:bg-black w-[300px] h-[300px] text-center flex items-center justify-center">
                <span class=" text-2xl font-semibold text-white">PHP</span>
            </button>
            <button class=" border-2 border-white bg-blue-900 hover:shadow-2xl rounded-md hover:bg-black w-[300px] h-[300px] text-center flex items-center justify-center">
                <span class=" text-2xl font-semibold text-gray-400">SQL</span>
            </button>
            <button class=" border-2 border-white bg-orange-600 hover:shadow-2xl rounded-md hover:bg-black w-[300px] h-[300px] text-center flex items-center justify-center">
                <span class=" text-2xl font-semibold text-white">Svelte</span>
            </button>
        </div>
    </div>

    </AuthenticatedLayout>

</template>

