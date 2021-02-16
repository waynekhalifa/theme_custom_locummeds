const path = require('path');
const webpack = require('webpack');

const JS_SRC = {
    App: './scripts/app.js',
    Vendor: './scripts/vendor.js'
};
const JS_DEST = './js';

module.exports = {
    entry: JS_SRC,
    output: {
        filename: '[name].js',
        path: path.resolve( __dirname, JS_DEST )
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env'],
                        plugins: ['@babel/plugin-proposal-class-properties']
                    }
                }
            }
        ]
    },
    mode: 'development',
    plugins: [
        new webpack.ProvidePlugin({
            $: "jquery",
            jQuery: "jquery",
            "window.jQuery": "jquery"
        })
    ]
};