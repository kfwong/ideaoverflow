const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

elixir(function(mix) {
    mix.scripts([
        ('parallax.min.js'),
        ('likebutton.js'),
        ('jquery-ias.min.js'),
        ('search.js')
    ], 'resources/assets/js/posts.js');
});

elixir(function (mix) {

    mix.copy('resources/assets/img', 'public/img');

    mix.copy('resources/assets/css', 'public/css')

    mix.copy('resources/assets/js/', 'public/js/');
});