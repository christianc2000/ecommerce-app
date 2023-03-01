const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors:{
                purple: {
                    '50':  '#fbfbfb',
                    '100': '#f5eff9',
                    '200': '#ead2f3',
                    '300': '#d5a9e3',
                    '400': '#c97ccf',
                    '500': '#b458bf',
                    '600': '#993ca4',
                    '700': '#742d7f',
                    '800': '#502055',
                    '900': '#2e1430',
                  },
                  cerise: {
                    '50':  '#fcfbfb',
                    '100': '#faf0f2',
                    '200': '#f5d0e5',
                    '300': '#e8a4c8',
                    '400': '#e375a7',
                    '500': '#d35189',
                    '600': '#ba3669',
                    '700': '#92294c',
                    '800': '#681d32',
                    '900': '#3e121b',
                  },
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
