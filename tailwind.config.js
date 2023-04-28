/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.{php,html}", "./js.*.{js,ts,jsx,tsx}"],
  theme: {
    extend: {},
    fontFamily: {
      body: [
        'Avenir',
        'Helvetica Neue',
        'Helvetica',
        'Arial',
        'Hiragino Sans',
        'ヒラギノ角ゴシック',
        'メイリオ',
        'Meiryo',
        'YuGothic',
        'Yu Gothic',
        'ＭＳ Ｐゴシック',
        'MS PGothic',
        'sans-serif'
      ],
    },
  },
  plugins: [],
};
