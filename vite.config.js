import { defineConfig, normalizePath } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import * as path from 'path';
import * as url from 'url';



export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.tsx',
            refresh: true,
        }),
        react(),
    ],
    server: {
        https: false,
        watch: {
            ignored: (p) => {
                const relativePath = path.relative(
                  path.resolve(url.fileURLToPath(import.meta.url), '..'),
                  p
                );
                return (
                  relativePath !== '' &&
                  relativePath !== 'resources' &&
                  !normalizePath(relativePath).startsWith('resources/')
                );
            }

        },
    }

});
