/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
      fontFamily:{
        'Sansation':['Sansation']
      },
      extend: {
        height: {
          '128': '32rem',
        }
      }
  },
  plugins: [],
}

