import './bootstrap';
import { createApp } from 'vue';
import AutobotCount from './components/AutobotCount.vue';

const app = createApp({});
app.component('autobot-count', AutobotCount); 
app.mount('#app'); 
