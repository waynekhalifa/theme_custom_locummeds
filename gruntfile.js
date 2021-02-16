const webpackConfig = require('./webpack.config.js');

module.exports = function(grunt) {
	grunt.initConfig({
		sass: {
			app: {
				files: {
					'style.css': 'sass/style.scss',
					// 'rtl.css':'sass/rtl.scss',
				}
			},
			options: {
				sourceMap: true, 
				outputStyle: 'compressed',
			}
		},

		webpack: {
			myConfig: webpackConfig,
		},

		watch: {
			sass: {
				files: ['sass/**/*.{scss,sass}'],
				tasks: ['sass'],
				options: {
				livereload: true
				}
			},
			webpack: {
				files: ['scripts/**/*.js'],
				tasks: ['webpack'],
				options: {
					livereload: true
				}
			},
			livereload: {
				files: ['*.html', '**/*.php', 'js/**/*.{js,json}', '*.css'],
				options: {
					livereload: true
				}
			}
		},

		clean: {
			folder: ['dist']
		},

		imagemin: {
			dynamic: {
				files: [{
					expand: true,
					cwd: 'img/',
					src: ['**/*.{png,jpg,gif}'],
					dest: 'dist/img'
				}]
			}
		},

		phpmin: {
			dist: {
				options: {
					removeComments: true,
        			collapseWhitespace: true
				},
				files: {
					'dist/': ['**/*.php', '!node_modules/**']
				}
			}
		},

		copy: {
			main: {
				files: [
					{expand: true, src: ['js/**'], dest: 'dist/'},
					{expand: true, src: ['style.css'], dest: 'dist/', filter: 'isFile'},
					{expand: true, src: ['screenshot.png'], dest: 'dist/', filter: 'isFile'},
				],
			},
		}
	});

	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-webpack');
	grunt.loadNpmTasks('grunt-contrib-clean');
	grunt.loadNpmTasks('grunt-contrib-imagemin');
	grunt.loadNpmTasks('grunt-phpmin');
	grunt.loadNpmTasks('grunt-contrib-copy');

	grunt.registerTask('default', ['sass', 'webpack', 'watch']);
	grunt.registerTask('build', ['clean', 'imagemin', 'phpmin', 'copy']);
};
