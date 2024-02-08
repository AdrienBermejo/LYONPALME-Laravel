import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                folty: ['"Folty"', 'sans-serif'],
            },
            colors: {
                framboise: '#DC143C',
                framboisehover:'#99082c',
                vert: '#008000',
            },
        },
    },

    plugins: [
        forms,
    ],
};
