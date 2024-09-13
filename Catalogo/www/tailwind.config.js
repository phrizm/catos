/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}"],
  theme: {
    extend: {
      fontFamily: {
        'inter': ['Inter', 'sans-serif'],
        'hubot': ['Hubot', 'sans-serif'],
      },
      fontSize: {
        '3xl': '28pt',
        '3xs': '6pt',
        '2xs': '8pt',
        'base': '8pt',
      },


     colors: {
        'brand': '#3FCF8E',
        'surface': '#FAFAFA',
        'surfacedark' : '#DFDFDF',
      },



    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}