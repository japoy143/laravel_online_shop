const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    daisyui:{
                themes:[ "light", 'dark']
            },


    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                primary:["Roboto", 'san-serif'],
                secondary:['Poppins', 'san-serif']
            },


        },
    },

    plugins: [require("@tailwindcss/forms"),  require('daisyui')],
};
