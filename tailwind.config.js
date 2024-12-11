import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                background: '#FCF6F5FF',
                primary: '#1C1C1BFF',
                secondary: '#1C1C1BFF',
                accent: '#F0F6F7FF',
            },
            fontFamily: {
                sans: ['AnticSans-Regular', 'sans-serif'],
            },
        },
    },
    plugins: [],
};
