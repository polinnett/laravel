import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler';
import App from './components/App.vue';  
// resources/js/components/App.vue

const app = createApp({
    components: {
        'App' : App,
    }
});

app.mount('#app');
