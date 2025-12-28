import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/app.css',
        'resources/js/app.js',
        'resources/js/table.js',
        'resources/js/analitik.js',
        'resources/js/bootstrap.js',
        'resources/js/pengunjung.js',
      ],
      refresh: true,
    }),
    tailwindcss(),
  ],
});
