/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.{html,js,php}",
  ],
  theme: {
    extend: {
      fontFamily: {
        roboto: ['Roboto', 'sans-serif'],
      },
      colors:{
        bgColor:'#8D9FFF',
        primaryColor:'#4460EF',
        'blue-light-bg': '#A0AFFF',
        'primary-main': '#4460EF',
        'dark-gray': '#BDBDBD',
      },
      backgroundImage: {
        'custom-enroll-bg': "url('../../../storages/enrollBg.png')",
      },
    },
  },
  plugins:[]
}