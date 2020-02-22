const path = require('path');
const VueLoaderPlugin = require('vue-loader/lib/plugin');
const webpack = require("webpack");

module.exports = {
    entry: './wp-content/themes/realsys/assets/js/js_frontend/src/app.js',
    output: {
        path: path.resolve(__dirname, '../wp-content/themes/realsys/assets/js/js_frontend/dist'),
        filename: 'bundle.js'
    },
    mode: "development",
    resolve: { alias: { vue: 'vue/dist/vue.esm.js' } },
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            },
            // this will apply to both plain `.css` files
            // AND `<style>` blocks in `.vue` files
            {
                test: /\.css$/,
                use: [
                    'vue-style-loader',
                    'style-loader',
                    'css-loader'
                ]
            },
            {
                test: /\.less$/,
                use: [
                    'vue-style-loader',
                    'style-loader',
                    'css-loader',
                    {
                        loader: 'less-loader',
                        options: {
                            modifyVars: {
                                'website': '"http://szukajdom.eu"'
                            }
                        },
                    }
                ]
            }
        ]
    },
    plugins: [
        // make sure to include the plugin for the magic
        new VueLoaderPlugin(),
        new webpack.DefinePlugin({
            'process.env.HOME_URL': JSON.stringify("http://szukajdom.eu")
        }),
    ]
};