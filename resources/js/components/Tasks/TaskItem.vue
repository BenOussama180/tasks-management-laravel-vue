<template>
    <div
        class="flex justify-between items-center border-b border-slate-200 py-3 px-2 border-l-4 border-l-transparent bg-gradient-to-r from-transparent to-transparent hover:from-slate-100 transition ease-linear duration-150"
    >
        <div class="inline-flex items-center space-x-2">
            <div @click="toggleCompleted()">
                <svg
                    v-if="!task.completed"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6 text-slate-500 hover:text-indigo-600 hover:cursor-pointer"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                    />
                </svg>
                <svg
                    v-else
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6 text-slate-500 hover:text-red-600 hover:cursor-pointer"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"
                    />
                </svg>
            </div>
            <div
                :class="{
                    'text-slate-500 line-through': task.completed,
                    'text-slate-700': !task.completed,
                }"
            >
                <!-- router view to show task -->
                <router-link
                    :to="{ name: 'show', params: { id: task.id } }"
                    class="underline"
                >
                    {{ task.name }}
                </router-link>
            </div>
        </div>
        <div>
            <p class="text-slate-600 text-sm">{{ task.created_at }}</p>
        </div>
    </div>
    <p v-if="errorMsg != ''" class="text-sm text-red-500">{{ errorMsg }}</p>
</template>

<script setup>
import { ref } from "vue";

let props = defineProps({
    task: {
        type: Object,
        required: true,
    },
});
let errorMsg = ref("");

const toggleCompleted = async () => {
    await axios
        .put(`/api/v1/tasks/${props.task.id}`, {
            completed: !props.task.completed,
            name: props.task.name,
            description: props.task.description,
        })
        .then((response) => {
            props.task.completed = response.data.task.completed;
        })
        .catch((error) => {
            console.log(error);
            errorMsg.value = error.response?.data.message;
        });
};
</script>
