import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/welcome.css',
                'resources/css/style.css',
                'resources/css/component/footer.css',
                'resources/css/component/header.css'
            ],
            refresh: true,
        }),
    ],
});
