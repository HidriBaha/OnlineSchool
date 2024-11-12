import { defineConfig } from 'vite'

export default defineConfig({
    root: 'src',
    // your Vite config options here
    server: {   // Ensure the root is the directory where index.html is located

        port: 3000, // Change the port if you want
    },
    build: {
        outDir: '../dist', // Specify output directory for production builds
    },
    plugins: [
        // Add any Vite plugins you may need
    ],
})