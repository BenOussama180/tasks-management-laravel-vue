import { createRouter, createWebHistory } from "vue-router";
import TasksList from "./components/Tasks/TasksList.vue";
import TaskForm from "./components/Tasks/TaskForm.vue";
import TaskShow from "./components/Tasks/TaskShow.vue";

const routes = [
    {
        path: "/",
        name: "list",
        component: TasksList,
    },
    {
        path: "/create",
        name: "create",
        component: TaskForm,
    },
    {
        path: "/show/:id",
        name: "show",
        component: TaskShow,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
