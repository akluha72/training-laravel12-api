console.log("create vue component.");

import './bootstrap';
import { createApp } from 'vue';
import Home from './components/Home.vue';
import { Bootstrap4Pagination } from 'laravel-vue-pagination';
import { Bootstrap5Pagination } from 'laravel-vue-pagination';
import { TailwindPagination } from 'laravel-vue-pagination';



// createApp(Home).mount('#app');
const app = createApp(Home);
app.component("TailwindPagination", TailwindPagination); // 👈 force register
app.mount("#app");