<template>
    <div class="flex">
        <div
            class="flex flex-col w-64 h-screen px-4 py-8 overflow-y-auto border-r"
        >
            <h2 class="text-3xl font-semibold text-center text-blue-800">
                Coding Challenge
            </h2>

            <div class="flex flex-col justify-between mt-6">
                <aside>
                    <ul>
                        <li>
                            <router-link
                                class="flex items-center px-4 py-2 mt-5 text-gray-600 rounded-md hover:bg-gray-200"
                                to="/"
                            >
                                <span class="mx-4 font-medium">Tasks list</span>
                            </router-link>
                        </li>
                        <li>
                            <router-link
                                to="/create"
                                class="flex items-center px-4 py-2 mt-5 text-gray-600 rounded-md hover:bg-gray-200"
                            >
                                <span class="mx-4 font-medium"
                                    >Create task
                                </span>
                            </router-link>
                        </li>
                    </ul>
                </aside>
            </div>
        </div>
        <div class="w-full h-full p-2 m-8 overflow-y-auto">
            <div class="border-4 border-dotted">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script setup>
import TasksList from "./components/Tasks/TasksList.vue";
</script>
