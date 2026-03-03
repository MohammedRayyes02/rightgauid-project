import './bootstrap';

import Alpine from 'alpinejs';
import Tagify from '@yaireo/tagify'
import '@yaireo/tagify/dist/tagify.css'

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", function () {
    const input = document.querySelector('input[name=facilities]');
    if (input) {
        new Tagify(input);
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const input = document.querySelector('input[name=tags]');
    if (input) {
        new Tagify(input);
    }
});