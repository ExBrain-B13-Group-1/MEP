/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["../*.{html,js,php}"],
  theme: {
    extend: {
      colors:{
        primarycolor:'#4460EF'
      },
      fontSize: {
        zm: "0.5rem",
      },
      boxShadow:{
        dshadow:'2px 0 6px 0  rgba(0, 0, 0, 0.3)'
      }
    },
  },
  plugins: [],
};
