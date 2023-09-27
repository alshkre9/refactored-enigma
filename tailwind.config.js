import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Kumbh Sans']
            },
        },

        colors: 
        {
            "transparent": 'transparent',
            "current": 'currentColor',
            "primary": "hsl(26, 100%, 55%)",
            "pale-primary": "hsl(25, 100%, 94%)",
            "dark-blue": "hsl(220, 13%, 13%)",
            "dark-grayish-blue": "hsl(219, 9%, 45%)",
            "grayish-blue": "#e8e7ec",
            "light-grayish-blue": "hsl(223, 64%, 98%)",
            "white": "hsl(0, 0%, 100%)",
            "black": "rgb(0, 0, 0)"
        },
    },

    plugins: [forms],
};

