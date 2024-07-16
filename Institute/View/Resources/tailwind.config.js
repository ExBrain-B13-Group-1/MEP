/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./Dashboard/**/*.{html,js,php}",
    "./Instructor/**/*.{html,js,php}",
    "./Student/**/*.{html,js,php}",
    "./Notification/**/*.{html,js,php}",
    "./Setting/**/*.{html,js,php}",
    "./js/**/*.{html,js,php}",
    "./Class/**/*.{html,js,php}",
    "./History/**/*.{html,js,php}",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      fontFamily: {
        customFont: ['Lato', "sans-serif"],
      },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

