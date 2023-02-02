<template>
    <div
        class="max-w-lg mx-auto my-10 bg-white p-8 rounded-xl shadow-lg shadow-slate-300"
    >
        <div class="flex flex-row justify-between items-center">
            <div>
                <h1 class="text-3xl font-medium">Tasks list</h1>
            </div>
        </div>
        <p class="text-slate-500">Hello, here are your latest tasks</p>

        <div class="my-5">
            <TaskItem v-for="task in tasks" :key="task.id" :task="task" />
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import TaskItem from "./TaskItem.vue";

let tasks = ref([]);
onMounted(async () => {
    await axios.get("/api/v1/tasks").then((response) => {
        tasks.value = response.data.tasks;
    });
});
</script>
