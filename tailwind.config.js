/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.php"],
  theme: {
    extend: {
      colors: {
        darkpink: "#875D67",
        lightpink: "#CFB6B2",
        mediumgrey: "#BABABC",
        whitesmoke: "#F5F4F2",
      },
      fontFamily: {
        primary: ["Lucida Grande", "ui-sans-serif", "system-ui"],
        secondary: ["Brush Script MT", "cursive"],
      },
    },
  },
  plugins: [require("@tailwindcss/typography")],
};
