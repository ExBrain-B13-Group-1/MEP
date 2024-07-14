/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./dashboard/**/*.{html,js,php}",
    "./js/**/*.{html,js,php}",
    "./class/**/*.{html,js,php}",
    "./history/**/*.{html,js,php}",
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
