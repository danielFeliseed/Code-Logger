<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

</script>

<template>
    <AuthenticatedLayout>
    <div class="mx-7 flex flex-col items-center justify-center min-h-screen">
       
        <div class="flex justify-center items-center">
            <div class=" border-2 border-white bg-slate-900 hover:shadow-2xl rounded-md hover:bg-black w-[300px] h-[300px] text-center flex items-center justify-center">
                <span class=" text-2xl font-semibold text-red-700">Laravel</span>
            </div>
        </div>
    </div>
    </AuthenticatedLayout>
</template>