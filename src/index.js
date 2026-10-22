import './style.css';
import Alpine from 'alpinejs';
import htmx from 'htmx.org';

window.Alpine = Alpine;
window.htmx = htmx;

/**
 * Antes de cada requisição HTMX, injeta o token CSRF atual no header.
 * O CI4 aceita o token tanto via POST body quanto via header X-CSRF-TOKEN.
 */
document.addEventListener('htmx:configRequest', (event) => {
    const meta = document.querySelector('meta[name="X-CSRF-TOKEN"]');
    if (meta) {
        event.detail.headers['X-CSRF-TOKEN'] = meta.getAttribute('content');
    }
});

/**
 * Após cada swap do HTMX, re-inicializa o Alpine nos novos elementos
 * para que diretivas x-data / @click funcionem corretamente.
 */
document.addEventListener('htmx:afterSwap', (event) => {
    if (window.Alpine) {
        window.Alpine.initTree(event.detail.target);
    }
});

Alpine.start();
