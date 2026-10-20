const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');

module.exports = (env, argv) => {
  const isProduction = argv.mode === 'production';

  return {
    // Ponto de entrada: arquivos dentro da pasta src/
    entry: {
      app: './src/index.js',
    },
    // Saída dos arquivos compilados em public/dist
    output: {
      path: path.resolve(__dirname, 'public/dist'),
      filename: 'js/[name].js',
      clean: true, // Limpa a pasta de saída antes de cada build
    },
    module: {
      rules: [
        {
          test: /\.css$/i,
          use: [
            MiniCssExtractPlugin.loader,
            'css-loader',
            '@tailwindcss/webpack',
          ],
        },
      ],
    },
    plugins: [
      new MiniCssExtractPlugin({
        filename: 'css/[name].css',
      }),
    ],
    optimization: {
      minimize: isProduction,
      minimizer: [
        '...', // Mantém a minificação padrão do JS (Terser) no Webpack 5
        new CssMinimizerPlugin(), // Minifica o CSS em produção
      ],
    },
    devtool: isProduction ? 'source-map' : 'eval-source-map',
  };
};
