const path = require('path');

module.exports = {
    entry: './wp-content/themes/realsys/assets/js/js_backend/src/main.js',
    output: {
        path: path.resolve(__dirname, 'wp-content/themes/realsys/assets/js/js_backend/dist'),
        filename: 'main.min.js'
    }
};