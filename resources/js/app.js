import './bootstrap';

import collapse from '@alpinejs/collapse'

// Swiper
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

// Swiper
window.Swiper = Swiper;

document.addEventListener('alpine:init', () => {
    window.Alpine.plugin(collapse);
});

