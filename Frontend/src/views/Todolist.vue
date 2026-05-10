<script setup>
import Navbar from '@/components/Navbar.vue'
import axios from 'axios';
import { onMounted, ref } from 'vue';

const data = ref([]);
const search = ref('')

const getData = async () => {
    try {
        const res = await axios.get(`http://localhost:8000/api/todolist?search=${search.value}`)
        data.value = res.data.data
    } catch (error) {
        console.log(error)
    }
}

const doneTodo = async (id) => {
    try {
        await axios.put(`http://localhost:8000/api/todolist/${id}`,
            {
                status: 'done'
            }
        )
        getData()
    } catch (error) {
        console.log(error)
    }
}

const deleteTodo = async (id) => {
    const confirmDelete = confirm('sure to delete?')

    if (!confirmDelete) return

    try {
        await axios.delete(`http://localhost:8000/api/todolist/${id}`)
        alert('data successfully deleted')
        getData()
    } catch (error) {
        console.log(error)
    }
}

onMounted( () => {
    getData()
})
</script>

<template>
    <Navbar />

    <div class="grid grid-cols-1 mt-8 gap-10 px-10">
        <div class="flex w-full gap-4">
            <input type="text" v-model="search" @input="getData()" class="focus:outline-blue-500 bg-gray-100 flex-1 p-3 rounded focus:bg-gray-50 shadow focus:shadow-xl transition duration-200 outline-1" placeholder="search" name="" id="">
            <div class="flex items-center bg-gray-100 p-3 rounded outline-1 shadow hover:shadow-xl transition duration-200 hover:outline-bluee-500 hover:outline-1">
                <i class='bx bx-search text-[25px]'></i>
            </div>
        </div>
        <div class="flex justify-center justify-center">
            <router-link class="bg-blue-500 text-white flex-1 justify-center flex py-3 rounded" to="/todolist/create">Create Todolist</router-link>
        </div>
        <div class="bg-slate-300 overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-900 text-white">
                    <tr>
                        <th class="p-3 text-start">No</th>
                        <th class="p-3 text-start">Title</th>
                        <th class="p-3 text-start">Description</th>
                        <th class="p-3 text-start">Updated At</th>
                        <th class="p-3 text-start">Status</th>
                        <th class="p-3 text-start">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in data" :key="item.id" class="hover:bg-slate-200 transition border-b-1 border-gray-200 duration-100">
                        <td class="p-3 text-start font-medium">{{ index + 1 }}</td>
                        <td class="p-3 text-start font-medium">{{ item.title }}</td>
                        <td class="p-3 text-start">{{ item.description }}</td>
                        <td class="p-3 text-start">{{ new Date(item.updated_at).toLocaleString() }}</td>
                        <td class="p-3 text-start font-medium pr-10">
                            <div v-if="item.status == 'pending'" class="flex justify-center p-1 rounded-2xl bg-yellow-500/20 border-2 border-yellow-500">
                                <p class="text-yellow-700 text-[13px]">{{ item.status }}</p>
                            </div>
                            <div v-else class="flex justify-center p-1 rounded-2xl bg-green-500/20 border-2 border-green-500">
                                <p class="text-green-700 text-[13px]">{{ item.status }}</p>
                            </div>
                        </td>
                        <td class="p-3 text-start flex gap-3">
                            <button v-if="item.status == 'pending'" type="submit" @click="doneTodo(item.id)" class="flex justify-center p-2 rounded w-fit text-yellow-700 bg-yellow-500/20 border-2 border-yellow-500">
                                <i class='bx bx-check-circle'></i>
                            </button>
                            <router-link :to="`/todolist/edit/${item.id}`" class="flex justify-center p-2 rounded w-fit text-green-700 bg-green-500/20 border-2 border-green-500">
                                <i class='bx bxs-edit'></i>
                            </router-link>
                            <button @click="deleteTodo(item.id)" class="flex justify-center p-2 rounded w-fit text-red-700 bg-red-500/20 border-2 border-red-500">
                                <i class='bx bxs-trash'></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>