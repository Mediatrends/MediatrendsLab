module.exports = function(grunt){

	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),

		watch:{
			configFiles:{
				files:['index.html'],
				tasks:['wiredep'],
				options:{
					livereload: true,
				},
			},
			sass:{
				files:['sass/**/*.scss'],
				tasks: ['sass'],
				options:{
					livereload:true,
				},
			},
			javascript:{
				files:['js/**/*.js','Gruntfile.js'],
				tasks:['jshint','uglify'],
				options:{
					livereload:true,
				},
			},
		},
		wiredep:{
			target:{
				src:[
					'index.html'
				],
			}
		},

		sass: {
			dist: {
				options: {
					style: 'compressed'
				},
				files: {
					'css/main.css': 'sass/**/*.scss'
				},
			},
		},

		jshint:{
			all:[
				'Gruntfile.js','js/**/*.js','!js/output.min.js'
			]
		},

		uglify:{
			all:{
				files:{
			        'js/output.min.js': ['js/scripts.js']
			    }
			}
		},

	});
	
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-wiredep');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-uglify');

	grunt.registerTask('dev', ['watch']);
	grunt.registerTask('default', ['wiredep','sass','uglify']);
};