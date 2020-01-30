/**
 * @author     Extly, CB <team@extly.com>
 * @copyright  Copyright (c)2007-2019 Extly, CB All rights reserved.
 * @license    GNU General Public License version 3 or later; see LICENSE.txt
 *
 * @see       https://www.extly.com
 */

const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const path = require('path');
const configProxy = require('./config-proxy.json');
const devMode = process.env.NODE_ENV !== 'production';

module.exports = {
  entry: './tailwind/src/styles.css',
  stats: { warnings: false }, // Hide warnings
  output: {
    path: path.resolve(__dirname, 'tailwind/dist')
  },
  mode: process.env.NODE_ENV,
  module: {
    rules: [
      {
        test: /\.css$/,
        use: [
          {
            loader: MiniCssExtractPlugin.loader,
            options: {
              hmr: process.env.NODE_ENV === 'development'
            }
          },
          'css-loader',
          'postcss-loader'
        ]
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: devMode ? '[name].css' : '[name].[hash].css',
      chunkFilename: devMode ? '[id].css' : '[id].[hash].css'
    }),
    new HtmlWebpackPlugin({
      filename: 'index.html',
      template: 'tailwind/src/index.html'
    }),
    new BrowserSyncPlugin({
      proxy: {
        target: configProxy.proxyURL
      },
      files: ['tailwind/src/*.*'],
      cors: true,
      reloadDelay: 0
    })
  ]
};
