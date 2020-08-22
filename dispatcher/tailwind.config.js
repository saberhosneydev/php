module.exports = {
  purge: {
    enabled: true,
    content: [
      './layouts/*.html',
      './pages/*.html',
      './*.php',
      './dashboard/*.php'
    ],
  },
  theme: {
    extend: {},
    screens: {
      sm: '640px',
      md: '768px',
      lg: '1024px',
    },
  },
  variants: {},
  plugins: [],
}
