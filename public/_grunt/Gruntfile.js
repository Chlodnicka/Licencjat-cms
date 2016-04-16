
module.exports = function (grunt) {

    var config = {
        src: '../public-grunt',
        dest: '../assets',
        js: grunt.file.readYAML('../public-grunt/js.yaml'),
    };

    grunt.initConfig({

        config: config,

        // combine png-s form `_sprites` dir into `img/sprites.png` and `_scss/_sprites/_map.scss`
        sprite: {
            assets: {
                src: '<%= config.src %>/sprites/**/*.png',
                dest: '<%= config.dest %>/css/img/sprites.png',
                destCss: '<%= config.src %>/scss/_sprites/_map.scss',
                imgPath: 'img/sprites.png',
                cssTemplate: function (params) {
                    var items = [];
                    params.items.forEach(function (item) {
                        var attrs = [
                            '    x: ' + item.x,
                            '    y: ' + item.y,
                            '    width: ' + item.width,
                            '    height: ' + item.height,
                        ];
                        items.push('  ' + item.name + ': (\n' + attrs.join(',\n') + '\n  )');
                    });
                    return '$sprites: (\n  _image: "' + params.spritesheet.image + '",\n' + items.join(',\n') + '\n);\n';
                },
            },
        },


        // sass task - process sass files
        sass: {
            options: {
                outputStyle: 'compressed', // or 'nested'
                sourceMap: true,
                imagePath: '/img',
                // precision: 5,
                // includePaths: [],
                livereload: true,
            },
            assets: {
                src: '<%= config.src %>/scss/default.scss',
                dest: '<%= config.dest %>/css/default.min.css',
            },
        },


        // autoprefixer task - add css vendor prefixes in preprocessed css files (after sass task!) // TODO: expand
        autoprefixer: {
            assets: {
                src: '<%= config.dest %>/css/default.min.css',
                dest: '<%= config.dest %>/css/default.min.css',
            },
        },


        // concat and minify js
        uglify: {
            options: {
                sourceMap: true,
                preserveComments: 'some'
            },
          //  assets: {
          //      src: config.js,
          //      dest: '<%= config.dest %>/js/main.min.js',
          //  },
        },


        // watch task
        watch: {
            options: {
                spawn: false,
                event: ['added', 'deleted', 'changed'],
                livereload: true,
            },
            grunt: {
                files: ['Gruntfile.js', '../public-grunt/js.yaml'],
            },
            sprites: {
                files: ['<%= config.src %>/sprites/**/*.png'],
                tasks: ['sprites'],
            },
            scss: {
                files: ['<%= config.src %>/scss/**/*.css', '<%= config.src %>/scss/**/*.scss'],
                tasks: ['scss'],
            },
            //js: {
            //    files: config.js,
            //    tasks: ['js'],
            //},
        },

    });


    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-spritesmith');


    grunt.registerTask('sprites', ['sprite', 'scss']);
    grunt.registerTask('scss', ['sass', 'autoprefixer']);
    grunt.registerTask('js', ['uglify']);
    grunt.registerTask('compile', ['sprites', 'scss', 'js']);
    grunt.registerTask('work', ['compile', 'watch']);
    grunt.registerTask('default', ['compile']);

};
