import './bootstrap';

// Alpinejs
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse'

// Swiper
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

// Swiper
window.Swiper = Swiper;
// Alpine
window.Alpine = Alpine;

Alpine.plugin(collapse);

Alpine.start();
