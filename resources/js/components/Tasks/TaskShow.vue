<template>
    <div class="text-2xl flex flex-col gap-10">
        <div>
            <span class="font-semibold text-blue-700">Task Name :</span>
            {{ task.name }}
        </div>
        <div>
            <span class="font-semibold text-blue-700">Task Description :</span>
            {{ task.description }}
        </div>
        <div>
            <span class="font-semibold text-blue-700">Completed? : </span
            >{{ task.completed ? "Yes" : "No" }}
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import { useRouter } from "vue-router";

let task = ref({});
let router = useRouter();

onMounted(async () => {
    await axios
        .get(`/api/v1/tasks/${router.currentRoute.value.params.id}`)
        .then((response) => {
            task.value = response.data.task;
        });
});
</script>
