import './bootstrap';
import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router'; // <-- you missed this
import Home from './components/Home.vue';
import CreateCategory from './components/CreateCategory.vue';
import { TailwindPagination } from 'laravel-vue-pagination';

const app = createApp({});

// register components globally
app.component('Home', Home);
app.component('CreateCategory', CreateCategory);
app.component("TailwindPagination", TailwindPagination);

app.mount('#app');