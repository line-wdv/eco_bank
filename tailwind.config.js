import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.js", // Opsional jika kamu pakai JS
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Tambahkan palet warna Eco Bank di sini
                "eco-dark": "#468432",
                "eco-light": "#9AD872",
                "eco-yellow": "#FFEF91",
                "eco-orange": "#FFA02E",
            },
        },
    },

    plugins: [forms, typography],
};
