<script setup>
import Navbar from '@/components/Navbar.vue'
import axios from 'axios';
import { onMounted, ref } from 'vue';

const data = ref([])

const getData = async () => {
    try {
        const res = await axios.get('http://127.0.0.1:8000/api/todolist')
        data.value = res.data.data
    } catch (error) {
        console.log(error)
    }
}

onMounted( () => {
    getData()
    document.title = 'Todolist'
})

</script>

<template>
    <Navbar />

    <div class="grid grid-cols-1 mt-8 gap-10 px-10">
        <div class="flex w-full gap-4">
            <input type="text" class="focus:outline-blue-500 bg-gray-100 flex-1 p-3 rounded focus:bg-gray-50 shadow focus:shadow-xl transition duration-200 outline-1" placeholder="search" name="" id="">
            <div class="flex items-center bg-gray-100 p-3 rounded outline-1 shadow hover:shadow-xl transition duration-200 hover:outline-bluee-500 hover:outline-1">
                <i class='bx bx-search text-[25px]'></i>
            </div>
        </div>
        <div class="flex justify-center justify-center">
            <router-link class="bg-blue-500 text-white flex-1 justify-center flex py-3 rounded" to="/todolist/create">Create Todolist</router-link>
        </div>
        <div class="bg-gray-300">
            <table class="w-full">
                <thead class="bg-gray-900 text-white">
                    <tr>
                        <th class="p-3 text-start">No</th>
                        <th class="p-3 text-start">Title</th>
                        <th class="p-3 text-start">Description</th>
                        <th class="p-3 text-start">Status</th>
                        <th class="p-3 text-start">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in data" :key="item.id" class="hover:bg-gray-200 transition duration-100">
                        <td class="p-3 text-start font-medium">{{ index + 1 }}</td>
                        <td class="p-3 text-start font-medium">{{ item.title }}</td>
                        <td class="p-3 text-start">{{ item.description }}</td>
                        <td class="p-3 text-start font-medium pr-10">
                            <div class="flex justify-center p-1 rounded-2xl bg-yellow-500/20 border-2 border-yellow-500">
                                <p class="text-yellow-700 text-[13px]">{{ item.status }}</p>
                            </div>
                        </td>
                        <td class="p-3 text-start">
                            <div class="flex justify-center p-2 rounded w-fit text-green-700 bg-green-500/20 border-2 border-green-500">
                                <i class='bx bxs-edit'></i>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>