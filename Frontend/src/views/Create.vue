<script setup>
import Navbar from '@/components/Navbar.vue';
import axios from 'axios';
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const title = ref('')
const description = ref('')
const router =useRouter()

const createTodo = async () => {
    await axios.post('http://127.0.0.1:8000/api/todolist',
        {
            title: title.value,
            description: description.value
        }
    )

    router.push('/todolist')
    title.value = ''
    description.value = ''
}

</script>

    <template>
        <Navbar />

        <div class="w-full flex flex-col p-5">
            <form action="" @submit.prevent="createTodo" class="py-10 gap-5 px-30 flex flex-col bg-gray-100 rounded w-full">
                <div class="font-bold text-[40px]">Create new Todo</div>
                <div class="flex flex-1 gap-3 flex-col">
                    <label for="" class="text-[20px]">Title</label>
                    <input type="text" v-model="title" class="focus:outline-0 p-3 transition duration-200 outline-gray-400 shadow focus:shadow-xl rounded outline-2 focus:outline-blue-500 focus:outline-2 focus:bg-white">
                </div>
                <div class="flex flex-1 gap-3 flex-col">
                    <label for="" class="text-[20px]">Description</label>
                    <input type="text" v-model="description" class="focus:outline-0 p-3 transition duration-200 outline-gray-400 shadow focus:shadow-xl rounded outline-2 focus:outline-blue-500 focus:outline-2 focus:bg-white">
                </div>
                <button type="submit" class="bg-blue-500 flex-1 text-white rounded py-3 cursor-pointer mt-8">Add</button>
            </form>
        </div>
    </template>