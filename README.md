## Multisite Maintenance Mode for WP

### Author: [J. Aaron Eaton][1]

### Version: 0.2.1

## Description

Multisite Maintenance Mode solves the problem of site users making content/database changes while performing maintenance on large multisite networks. It works by directing every user (except network admins) to their homepage when they attempt to log in. A message is displayed in the admin bar to direct them on where to find more information. Anonymous users can still view the site normally.

## Use

* Unzip and upload to `wp-content/plugins`
* Network activate the plugin
* Go to Network Settings -> Multisite Maintenance Mode
* Turn on Multisite Maintenance Mode

## Planned Features

* Allow for network admins to specify the message link from the dashboard.
* Your idea here.

## License

Multisite Maintenance Mode is licensed under the GPL v2 or later.

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

### 0.2.1

* Tested with WordPress 4.2.2

### 0.2.0

* Now ready for translation!
* Consolidated the PHP for easier maintenance.
* Added filter 'mmm_allow_user_with_capability' to allow lower-level users to access the WordPress admin.

### v0.1

* Initial code.

[1]:http://channeleaton.com
