import './bootstrap';
import 'htmx.org';

import Alpine from 'alpinejs';
import mask from '@alpinejs/mask';
import persist from '@alpinejs/persist';
Alpine.plugin(mask);
Alpine.plugin(persist);
window.Alpine = Alpine;
Alpine.start();