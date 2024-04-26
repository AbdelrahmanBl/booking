/** @type {import('tailwindcss').Config} */
import colors from 'tailwindcss/colors'

export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
      extend: {},
      colors: {
        primary: colors.blue,
        ...colors,
      },
    },
    plugins: [],
  }
