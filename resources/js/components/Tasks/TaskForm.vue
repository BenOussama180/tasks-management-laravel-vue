<template>
    <div class="flex flex-col items-center mt-10">
        <h2 class="text-2xl font-medium">Create Task</h2>
        <div class="w-full max-w-sm mt-5">
            <form
                class="bg-white p-5 rounded-lg shadow-lg"
                @submit.prevent="submitTask"
            >
                <div class="mb-4">
                    <p class="text-red-500" v-if="errorMsg">{{ errorMsg }}</p>
                </div>
                <div class="mb-4">
                    <label
                        class="block text-gray-700 font-medium mb-2"
                        for="name"
                    >
                        Task Name
                    </label>
                    <input
                        v-model="task.name"
                        class="w-full border border-gray-400 p-2 rounded-lg"
                        type="text"
                        id="name"
                        placeholder="Enter task name"
                        autocomplete="off"
                    />
                </div>
                <div class="mb-4">
                    <label
                        class="block text-gray-700 font-medium mb-2"
                        for="description"
                    >
                        Task Description
                    </label>
                    <textarea
                        v-model="task.description"
                        class="w-full border border-gray-400 p-2 rounded-lg h-32"
                        id="description"
                        placeholder="Enter task description"
                    ></textarea>
                </div>
                <div class="mb-4 flex items-center">
                    <input
                        v-model="task.completed"
                        class="mr-2"
                        type="checkbox"
                        id="completed"
                    />
                    <label class="font-medium" for="completed">
                        Task Completed
                    </label>
                </div>
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg"
                    type="submit"
                >
                    Create Task
                </button>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
let task = ref({
    name: "",
    description: "",
    completed: false,
});
let errorMsg = ref("");
let router = useRouter();

const submitTask = async () => {
    await axios
        .post("/api/v1/tasks", task.value)
        .then((response) => {
            router.push("/");
        })
        .catch((error) => {
            errorMsg.value = error.response?.data.message;
        });
};
</script>
