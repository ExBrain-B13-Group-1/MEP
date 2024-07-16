/** @type {import('tailwindcss').Config} */
module.exports = {
<<<<<<< HEAD
  content: ["./**/*.{html,js,php}"],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Lato', 'sans-serif'],
      },
      colors: {
        'blue-light-bg': '#A0AFFF',
        'primary-main': '#4460EF',
        'dark-gray': '#BDBDBD',
        'thin-bg':'rgba(160, 175, 255, 0.2)',
        'thin-hover-bg':'rgba(160, 175, 255, 0.3)',
        'dark-blue': '#1330C2',
        'card-bg':'#F5F5F5',
         primarycolor:'#4460EF',
      },
      backgroundImage: {
        'custom-bg': "url('../img/loginBg.png')",
=======
  content: ["../*.{html,js,php}"],
  theme: {
    extend: {
      colors:{
        primarycolor:'#4460EF'
>>>>>>> paing-sett-kyaw
      },
      fontSize: {
        zm: "0.5rem",
      },
<<<<<<< HEAD
      boxShadow: {
        'custom': '0 2px 4px 0 rgba(0, 0, 0, 0.25)',
        'custom-finance': '0px 0px 5px 1px rgba(0, 0, 0, 0.25)',
         dshadow:'2px 0 6px 0  rgba(0, 0, 0, 0.3)'
=======
      boxShadow:{
        dshadow:'2px 0 6px 0  rgba(0, 0, 0, 0.3)'
>>>>>>> paing-sett-kyaw
      }
    },
  },
  plugins: [],
<<<<<<< HEAD
}

=======
};
>>>>>>> paing-sett-kyaw
