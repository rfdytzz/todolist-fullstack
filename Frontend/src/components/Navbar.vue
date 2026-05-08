<script setup>
import { useRoute } from 'vue-router';

const router = useRoute()
</script>

<template>
    <div class="flex bg-gray-900 text-white p-5 items-center justify-between">
        <h2 class="font-bold text-[30px]">Lo<span class="text-green-500">go</span></h2>
        <ul class="flex gap-5">
            <router-link :class="router.path === '/' ? 'text-green-500' : ''" to="/" class="hover:text-green-500  transition duration-200">Home</router-link>
            <router-link :class="router.path === '/todolist' ? 'text-green-500' : ''" to="/todolist" class="hover:text-green-500 transition duration-200">Todolist</router-link>
        </ul>
        <img class="size-14 rounded-full" src="https://randomuser.me/api/portraits/men/32.jpg" alt="">
    </div>
</template>