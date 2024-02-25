<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-zinc-950 relative">
        <img class="absolute z-10" src="/Image 2024-02-25 at 3.14 PM_prev_ui.png" alt="">

        <div class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-slate-800 shadow-md overflow-hidden sm:rounded-lg relative z-20">
            <slot />
        </div>
    </div>
</template>

<style>
   
  
</style>
