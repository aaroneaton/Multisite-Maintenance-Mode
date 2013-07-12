# WordPress Plugin Boilerplate (Extended)

The WordPress Plugin Boilerplate (Extended) is based on [Tom McFarlin's](http://http://tommcfarlin.com/) [WordPress Plugin Boilerplate](https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate). In addition to the great standards that it introduces, the extended version includes some extra goodies for developers such as Grunt, Coffeescript, Compass and others.

## Features

* The Plugin Boilerplate is fully-based on the WordPress [Plugin API](http://codex.wordpress.org/Plugin_API)
* Uses [PHPDoc](http://en.wikipedia.org/wiki/PHPDoc) conventions for easily following the code
* Liberal use of `@todo` to guide you through what you need to change
* Uses a strict file organization scheme to make sure the assets are easily maintainable
* Grunt tasks to help you process Coffeescript and Compass
* Uses the [WordPress Settings Framework](https://github.com/gilbitron/WordPress-Settings-Framework) to make plugin settings simple as pie.
* Meta boxes and fields are easier than ever to create with [Custom Metaboxes and Fields](https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress)
* Plugin can update directly from GitHub with the [WordPress GitHub Plugin Updater](https://github.com/jkudish/WordPress-GitHub-Plugin-Updater)
* JavaScript and CSS are linted with [JSHint][8] and [CSSLint][9]

## System Requirements

* [Node][10]
* [NPM][11]
* [CoffeeScript][12]
* [Grunt][13]
* [Ruby][14]
* [Ruby Gems][15]
* [Compass][16]
 
## Installation and Use

1. Clone this repo to the desired location.
2. In your terminal, navigate to the plugin location `cd /path/to/the/plugin`
3. Run `npm install` to set up the grunt modules
4. Run `grep -rn '@todo' .` to find all of the `@todo` locations. Edit the todo items as instructed.
5. Run `grunt watch` and edit to your heart's content. Grunt will automatically compile your Coffeescript and Compass files to the correct location.
 
*NOTE:* If you add Compass or Coffeescript files, be sure to add them to the `Gruntfile` as well as the main plugin file.

## License

The WordPress Plugin Boilerplate is licensed under the GPL v2 or later.

> This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

> This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

> You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

## Changelog

### v0.1

* Added initial extended functionality to the original plugin boilerplate
* Cleaned up comments based on my practices

## Author Information

The WordPress Plugin Boilerplate was originally started and is maintained by [Tom McFarlin](http://twitter.com/tommcfarlin/). The extended version was created by [J. Aaron Eaton](http://twitter.com/aaroneaton/).

[8]: http://www.jshint.com/
[9]: http://csslint.net/
[10]: http://nodejs.org/
[11]: https://npmjs.org/
[12]: http://coffeescript.org/
[13]: http://gruntjs.com/
[14]: http://www.ruby-lang.org/en/
[15]: http://rubygems.org/
[16]: http://compass-style.org/
