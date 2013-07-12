module.exports = (grunt) ->
  @initConfig
    pkg: @file.readJSON('package.json')
    watch:
      files: ['**/**.coffee', '**/*.scss']
      tasks: ['default']
    coffee:
      compile:
        options:
          bare: true
          sourceMap: true
        files:
          'js/display.min.js': 'js/src/display.coffee'
          'js/admin.min.js': 'js/src/admin.coffee'
    compass:
      dist:
        options:
          config: 'config.rb'
    jshint:
      files: [
        'js/display.min.js'
        'js/admin.min.js'
      ]
      options:
        globals:
          jQuery: true
          console: true
          module: true
          document: true
    csslint:
      src: ['css/*.css']
    cssmin:
      compress:
        options:
          banner: "/* Don't even attempt to edit this file */"
          report: 'min'
        files:
          'css/admin.min.css': ['css/admin.css']
          'css/display.min.css': ['css/display.css']

  @loadNpmTasks 'grunt-contrib-coffee'
  @loadNpmTasks 'grunt-contrib-compass'
  @loadNpmTasks 'grunt-contrib-jshint'
  @loadNpmTasks 'grunt-contrib-csslint'
  @loadNpmTasks 'grunt-contrib-cssmin'
  @loadNpmTasks 'grunt-contrib-watch'

  @registerTask 'default', ['coffee', 'jshint', 'compass', 'csslint']
  @registerTask 'package', ['default', 'cssmin']

  @event.on 'watch', (action, filepath) =>
    @log.writeln('#{filepath} has #{action}')