// Generated on 2015-12-15 using
// generator-webapp 0.5.1
'use strict';

// # Globbing
// for performance reasons we're only matching one level down:
// 'test/spec/{,*/}*.js'
// If you want to recursively match all subfolders, use:
// 'test/spec/**/*.js'

module.exports = function (grunt) {

  // Time how long tasks take. Can help when optimizing build times
  require('time-grunt')(grunt);

  // Load grunt tasks automatically
  require('load-grunt-tasks')(grunt);

  // Configurable paths
  var config = {
    app: 'assets',
    dist: 'dist'
  };

  // Define the configuration for all the tasks
  grunt.initConfig({

    // Project settings
    config: config,

    // Watches files for changes and runs tasks based on the changed files
    watch: {
      bower: {
        files: ['bower.json'],
        tasks: ['wiredep']
      },
      js: {
        files: ['<%= config.app %>/scripts/{,*/}*.js'],
        tasks: ['jshint'],
        options: {
          livereload: true
        }
      },
      jstest: {
        files: ['test/spec/{,*/}*.js'],
        tasks: ['test:watch']
      },
      gruntfile: {
        files: ['Gruntfile.js']
      },
      styles: {
        files: ['<%= config.app %>/css/{,*/}*.css'],
        tasks: ['newer:copy:styles', 'autoprefixer']
      },
      livereload: {
        options: {
          livereload: '<%= connect.options.livereload %>'
        },
        files: [
          '<%= config.app %>/{,*/}*.html',
          '.tmp/styles/{,*/}*.css',
          '<%= config.app %>/images/{,*/}*'
        ]
      }
    },
    less: {
      development: {
        options: {
          // paths: ['<%= config.app %>/styles/']
        },
        files: {
          "<%= config.app %>/css/main.css": "<%= config.app %>/less/main.less"
        }
      },
      production: {
        options: {
        //  paths: ['<%= config.app %>/styles/'],
        //  plugins: [
        //    new (require('less-plugin-autoprefix'))({browsers: ["last 2 versions"]}),
        //    new (require('less-plugin-clean-css'))(cleanCssOptions)
        //  ],
        //  modifyVars: {
        //    imgPath: '"http://mycdn.com/path/to/images"',
        //    bgColor: 'red'
        //  }
        },
        files: {
          "<%= config.app %>/css/main.css": "<%= config.app %>/less/main.less"
        }
      }
    },
    //
    // // The actual grunt server settings
    // connect: {
    //   options: {
    //     port: 7777,
    //     open: true,
    //     livereload: 45729,
    //     // Change this to '0.0.0.0' to access the server from outside
    //     hostname: '0.0.0.0'
    //   },
    //   livereload: {
    //     options: {
    //       middleware: function(connect) {
    //         return [
    //           connect.static('.tmp'),
    //           connect().use('/assets/bower_components', connect.static('./assets/bower_components')),
    //           connect.static(config.app)
    //         ];
    //       }
    //     }
    //   },
    //   test: {
    //     options: {
    //       open: false,
    //       port: 7778,
    //       middleware: function(connect) {
    //         return [
    //           connect.static('.tmp'),
    //           connect.static('test'),
    //           connect().use('/assets/bower_components', connect.static('./assets/bower_components')),
    //           connect.static(config.app)
    //         ];
    //       }
    //     }
    //   },
    //   dist: {
    //     options: {
    //       base: '<%= config.dist %>',
    //       livereload: false
    //     }
    //   }
    // },

    // Empties folders to start fresh
    clean: {
      dist: {
        files: [{
          dot: true,
          src: [
            '.tmp',
            '<%= config.dist %>/*',
            '!<%= config.dist %>/.git*'
          ]
        }]
      },
      server: '.tmp'
    },

    // Make sure code styles are up to par and there are no obvious mistakes
    jshint: {
      options: {
        jshintrc: '.jshintrc',
        reporter: require('jshint-stylish')
      },
      all: [
        'Gruntfile.js',
        '<%= config.app %>/scripts/{,*/}*.js',
        '!<%= config.app %>/scripts/vendor/*',
        'test/spec/{,*/}*.js'
      ]
    },

    // Mocha testing framework configuration options
    // mocha: {
    //   all: {
    //     options: {
    //       run: true,
    //       urls: ['http://<%= connect.test.options.hostname %>:<%= connect.test.options.port %>/index.html']
    //     }
    //   }
    // },

    // Add vendor prefixed styles
    // autoprefixer: {
    //   options: {
    //     browsers: ['> 1%', 'last 2 versions', 'Firefox ESR', 'Opera 12.1']
    //   },
    //   dist: {
    //     files: [{
    //       expand: true,
    //       cwd: '.tmp/styles/',
    //       src: '{,*/}*.css',
    //       dest: '.tmp/styles/'
    //     }]
    //   }
    // },
    //
    // // Automatically inject Bower components into the HTML file
    // wiredep: {
    //   app: {
    //     ignorePath: /^\/|\.\.\//,
    //     src: ['<%= config.app %>/index.html'],
    //     exclude: ['assets/bower_components/bootstrap/dist/js/bootstrap.js']
    //   }
    // },
    //
    // // Renames files for browser caching purposes
    // rev: {
    //   dist: {
    //     files: {
    //       src: [
    //         '<%= config.dist %>/scripts/{,*/}*.js',
    //         '<%= config.dist %>/css/{,*/}*.css',
    //         '<%= config.dist %>/images/{,*/}*.*',
    //         '<%= config.dist %>/fonts/{,*/}*.*',
    //         '<%= config.dist %>/*.{ico,png}'
    //       ]
    //     }
    //   }
    // },
    //
    // // Reads HTML for usemin blocks to enable smart builds that automatically
    // // concat, minify and revision files. Creates configurations in memory so
    // // additional tasks can operate on them
    // useminPrepare: {
    //   options: {
    //     dest: '<%= config.dist %>'
    //   },
    //   html: '<%= config.app %>/index.html'
    // },
    //
    // // Performs rewrites based on rev and the useminPrepare configuration
    // usemin: {
    //   options: {
    //     assetsDirs: [
    //       '<%= config.dist %>',
    //       '<%= config.dist %>/images',
    //       '<%= config.dist %>/css'
    //     ]
    //   },
    //   html: ['<%= config.dist %>/{,*/}*.html'],
    //   css: ['<%= config.dist %>/css/{,*/}*.css']
    // },

    // The following *-min tasks produce minified files in the dist folder
    // imagemin: {
    //   dist: {
    //     files: [{
    //       expand: true,
    //       cwd: '<%= config.app %>/images',
    //       src: '{,*/}*.{gif,jpeg,jpg,png}',
    //       dest: '<%= config.dist %>/images'
    //     }]
    //   }
    // },

    // svgmin: {
    //   dist: {
    //     files: [{
    //       expand: true,
    //       cwd: '<%= config.app %>/images',
    //       src: '{,*/}*.svg',
    //       dest: '<%= config.dist %>/images'
    //     }]
    //   }
    // },

    // htmlmin: {
    //   dist: {
    //     options: {
    //       collapseBooleanAttributes: true,
    //       collapseWhitespace: true,
    //       conservativeCollapse: true,
    //       removeAttributeQuotes: true,
    //       removeCommentsFromCDATA: true,
    //       removeEmptyAttributes: true,
    //       removeOptionalTags: true,
    //       removeRedundantAttributes: true,
    //       useShortDoctype: true
    //     },
    //     files: [{
    //       expand: true,
    //       cwd: '<%= config.dist %>',
    //       src: '{,*/}*.html',
    //       dest: '<%= config.dist %>'
    //     }]
    //   }
    // },

    // By default, your `index.html`'s <!-- Usemin block --> will take care
    // of minification. These next options are pre-configured if you do not
    // wish to use the Usemin blocks.
    // cssmin: {
    //   dist: {
    //     files: {
    //       '<%= config.dist %>/css/main.css': [
    //         '.tmp/styles/{,*/}*.css',
    //         '<%= config.app %>/css/{,*/}*.css'
    //       ]
    //     }
    //   }
    // },
    // uglify: {
    //   dist: {
    //     files: {
    //       '<%= config.dist %>/scripts/scripts.js': [
    //         '<%= config.dist %>/scripts/scripts.js'
    //       ]
    //     }
    //   }
    // },
    // concat: {
    //   dist: {}
    // },

    // Copies remaining files to places other tasks can use
    // copy: {
    //   dist: {
    //     files: [{
    //       expand: true,
    //       dot: true,
    //       cwd: '<%= config.app %>',
    //       dest: '<%= config.dist %>',
    //       src: [
    //         '*.{ico,png,txt}',
    //         'images/{,*/}*.webp',
    //         '{,*/}*.html',
    //         'fonts/{,*/}*.*'
    //       ]
    //     }, {
    //       src: 'node_modules/apache-server-configs/dist/.htaccess',
    //       dest: '<%= config.dist %>/.htaccess'
    //     }, {
    //       expand: true,
    //       dot: true,
    //       cwd: 'assets/bower_components/bootstrap/dist',
    //       src: 'fonts/*',
    //       dest: '<%= config.dist %>'
    //     }]
    //   },
    //   styles: {
    //     expand: true,
    //     dot: true,
    //     cwd: '<%= config.app %>/styles',
    //     dest: '.tmp/styles/',
    //     src: '{,*/}*.css'
    //   }
    // },

    // Run some tasks in parallel to speed up build process
    // concurrent: {
    //   server: [
    //     'copy:styles'
    //   ],
    //   test: [
    //     'copy:styles'
    //   ],
    //   dist: [
    //     'copy:styles'//,
    //     // 'imagemin',
    //     // 'svgmin'
    //   ]
    // }
  });


  // grunt.registerTask('serve', 'start the server and preview your app, --allow-remote for remote access', function (target) {
  //   if (grunt.option('allow-remote')) {
  //     grunt.config.set('connect.options.hostname', '0.0.0.0');
  //   }
  //   if (target === 'dist') {
  //     return grunt.task.run(['build', 'connect:dist:keepalive']);
  //   }
  //
  //   grunt.task.run([
  //     'clean:server',
  //     'wiredep',
  //     // 'concurrent:server',
  //     // 'autoprefixer',
  //     'connect:livereload',
  //     'watch'
  //   ]);
  // });

  // grunt.registerTask('server', function (target) {
  //   grunt.log.warn('The `server` task has been deprecated. Use `grunt serve` to start a server.');
  //   grunt.task.run([target ? ('serve:' + target) : 'serve']);
  // });

  // grunt.registerTask('test', function (target) {
  //   if (target !== 'watch') {
  //     grunt.task.run([
  //       'clean:server',
  //       'concurrent:test',
  //       'autoprefixer'
  //     ]);
  //   }
  //
  //   grunt.task.run([
  //     'connect:test',
  //     'mocha'
  //   ]);
  // });

  grunt.registerTask('build', [
    'clean:dist',
    'less'
    // 'wiredep',
    // 'useminPrepare',
    // 'concurrent:dist',
    // 'autoprefixer',
    // 'concat',
    // 'cssmin',
    // 'uglify',
    // 'copy:dist',
    // 'rev',
    // 'usemin',
    // 'htmlmin'
  ]);

  grunt.registerTask('default', [
    'newer:jshint',
    // 'test',
    'build'
  ]);
};
