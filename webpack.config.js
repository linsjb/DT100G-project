/*
* File name: webpack.config.js
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*
* Description:
* Configuration file for the javascript webpack module.
*/

const path = require('path');
const ExtractTextPlugin = require("extract-text-webpack-plugin");

module.exports = {
  entry: './src/js/main.js',
  output: {
    filename: 'bundle.js',
    path: path.resolve(__dirname, 'dist/js')
  },
};
