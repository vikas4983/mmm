import { defineConfig } from 'vite';

export default defineConfig({
  root: 'C:/xampp/htdocs/mmm',
  build: {
    outDir: 'dist', 
    rollupOptions: {
      input: 'C:/xampp/htdocs/mmm/index.html',
    },
  },
});
