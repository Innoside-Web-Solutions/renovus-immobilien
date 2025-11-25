let mix = require('laravel-mix');

// settings / config
const css_out_dir = 'assets/css';
const js_out_dir = 'assets/js';

// BLOCKS
const blocks = ['price', 'icon-text'];

// css task definitions
const css_tasks = [
    { name: 'css-style', file: './src/scss/style.scss', dest: '.' },
    { name: 'css-login', file: './src/scss/login.scss', dest: css_out_dir },
    { name: 'css-editor', file: './src/scss/style-editor.scss', dest: css_out_dir },
];

// block styles hinzufügen
/*blocks.forEach(block => {
    css_tasks.push(
        { name: `css-block-${block}`, file: `./src/blocks/${block}/style.scss`, dest: `blocks/${block}` },
       { name: `css-block-${block}`, file: `./src/blocks/${block}/editor.scss`, dest: `blocks/${block}` }
    );
});*/

// js task definitions
const js_tasks = [
    { name: 'js-scripts', file: 'src/js/scripts.js', dest: js_out_dir, uglify: true },
    { name: 'gsap-scripts', file: 'src/js/app.js', dest: js_out_dir, uglify: false },
    { name: 'js-editor', file: 'src/js/editor.js', dest: js_out_dir, uglify: false },
    { name: 'js-slider', file: 'src/js/slider.js', dest: js_out_dir, uglify: true },
];

// block scripts hinzufügen
/*blocks.forEach(block => {
    js_tasks.push(
        { name: `js-block-${block}`, file: `src/blocks/${block}/index.js`, dest: `blocks/${block}`, uglify: true }
    );
});*/

// CSS Tasks ausführen
for (const task of css_tasks) {
    const sass_task = mix.sass(task.file, task.dest);
    if (!mix.inProduction()) {
        sass_task.sourceMaps();
    }
}

// JS Tasks ausführen
for (const task of js_tasks) {
    const js_task = mix.js(task.file, task.dest);
    if (!mix.inProduction()) {
        js_task.sourceMaps();
    }
}

// Mix Optionen
mix.setPublicPath('dist').options({ processCssUrls: false });

mix.browserSync({
    proxy: 'localhost:90',
    port: 90,
    files: [
        'dist/**/*.php',
        'src/**/*',
    ]
});
