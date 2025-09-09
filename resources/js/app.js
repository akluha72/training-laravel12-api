console.log("create vue component.");

import './bootstrap';
import { createApp } from 'vue';
import Home from './components/Home.vue';

createApp(Home).mount('#app');