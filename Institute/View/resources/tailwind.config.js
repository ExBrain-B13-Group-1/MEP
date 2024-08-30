/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./Auth/**/*.{html,js,php}",
    "./Dashboard/**/*.{html,js,php}",
    "./Common/**/*.{html,js,php}",
    "./Event/**/*.{html,js,php}",
    "./Instructor/**/*.{html,js,php}",
    "./Student/**/*.{html,js,php}",
    "./Notification/**/*.{html,js,php}",
    "./Enrollment/**/*.{html,js,php}",
    "./Setting/**/*.{html,js,php}",
    "./js/**/*.{html,js,php}",
    "./Class/**/*.{html,js,php}",
    "./History/**/*.{html,js,php}",
    "./common/**/*.{html,js,php}",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      fontFamily: {
        customFont: ['Lato', "sans-serif"],
      },
      backgroundImage: {
        'custom-bg': "url('../../../storages/loginBg.png')",
      },
      // Adding new utilities for scrollbar hiding
      scrollbarHide: {
      '&::-webkit-scrollbar': {
        display: 'none',
      },
      '-ms-overflow-style': 'none',
        'scrollbar-width': 'none',
      },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

