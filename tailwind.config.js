import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: ["class"],

    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                display: ['"Big Shoulders Display"', "sans-serif"],
                plate: ['"IBM Plex Mono"', "monospace"],
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                ink: "#12161C", // asphalt — bg gelap & teks utama
                paper: "#EEF1EE", // bg terang
                graphite: "#1B2027", // teks body di atas paper
                steel: "#2F4858", // aksen sekunder (badge, kartu)
                // Aksen utama sekarang pakai palet bawaan Tailwind: sky-400/600 & blue-700
                // (sama seperti gradient di dashboard customer), jadi tidak perlu didaftarkan di sini.
            },
        },
    },

    plugins: [forms],
};
