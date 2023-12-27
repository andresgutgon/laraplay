const defaultTheme = require("tailwindcss/defaultTheme.js");
const forms = require("@tailwindcss/forms");

// FIXME: Use ES6 module syntax when supported by Blash (PHP Storybook)
// https://github.com/area17/blast/issues/98

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/views/**/*.blade.php",
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ["Inter", ...defaultTheme.fontFamily.sans],
      },
      fontSize: {
        h2: '26px',
      },
      lineHeight: {
        h1: '48px',
      },
    },
  },

  plugins: [forms],
};
