<script setup>
import Navbar from '@/components/Navbar.vue'
import axios from 'axios'
import { onMounted, ref } from 'vue'
import { useRoute, useRouter } from 'vue-router'

const route = useRoute()
const router = useRouter()

const title = ref('')
const description = ref('')

const getTodo = async () => {
  try {
    const res = await axios.get(`http://localhost:8000/api/todolist/${route.params.id}`)
    title.value = res.data.data.title
    description.value = res.data.data.description
  } catch (error) {
    console.log(error)
  }
}

const loading = ref(false)

const updateTodo = async () => {
  loading.value = true
  try {
    const res = await axios.put(`http://localhost:8000/api/todolist/${route.params.id}`, {
      title: title.value,
      description: description.value,
    })

    console.log(res)

    router.push('/todolist')
  } catch (error) {
    console.log(error)
  }
}

onMounted(() => {
  getTodo()
})
</script>

<template>
  <Navbar />
  <div v-if="loading" class="fixed top-0 left-0 w-full h-1 bg-blue-500 animate-pulse z-50"></div>
  <div class="w-full flex flex-col p-5">
    <form
      action=""
      @submit.prevent="updateTodo"
      class="py-10 gap-5 px-30 flex flex-col bg-gray-100 rounded w-full"
    >
      <div class="font-bold text-[40px]">Create new Todo</div>
      <div class="flex flex-1 gap-3 flex-col">
        <label for="" class="text-[20px]">Title</label>
        <input
          type="text"
          v-model="title"
          class="focus:outline-0 p-3 transition duration-200 outline-gray-400 shadow focus:shadow-xl rounded outline-2 focus:outline-blue-500 focus:outline-2 focus:bg-white"
        />
      </div>
      <div class="flex flex-1 gap-3 flex-col">
        <label for="" class="text-[20px]">Description</label>
        <input
          type="text"
          v-model="description"
          class="focus:outline-0 p-3 transition duration-200 outline-gray-400 shadow focus:shadow-xl rounded outline-2 focus:outline-blue-500 focus:outline-2 focus:bg-white"
        />
      </div>
      <button type="submit" class="bg-blue-500 flex-1 text-white rounded py-3 cursor-pointer mt-8">
        Edit
      </button>
    </form>
  </div>
</template>
