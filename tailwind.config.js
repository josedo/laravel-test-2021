const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        minWidth: {
            '0': '0',
            full: '100%',
            '32': '8rem'
        },
        colors: {
            // Build your palette here
            transparent: 'transparent',
            white: '#FFFFFF',
            green: colors.lime,
            gray: colors.trueGray,
            red: colors.red,
            blue: colors.sky,
            yellow: colors.amber,
        },
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
