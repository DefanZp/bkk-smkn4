import './bootstrap';

// collapse plugin
import collapse from '@alpinejs/collapse'

// intersect / counter plugin for homepage statistic
import intersect from '@alpinejs/intersect'

// Swiper
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

// Swiper
window.Swiper = Swiper;

document.addEventListener('alpine:init', () => {
    window.Alpine.plugin(collapse);
    window.Alpine.plugin(intersect);
});

