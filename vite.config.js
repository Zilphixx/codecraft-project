import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js', 
                'resources/forum/blade-bootstrap/css/forum.css',
                'resources/forum/blade-bootstrap/js/forum.js'
            ],
            refresh: true,
        }),
    ],
});
