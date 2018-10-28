# Opencycle 

[![GitHub release](https://img.shields.io/github/release/opencycle/opencycle.svg)](https://github.com/opencycle/opencycle/releases)
 [![Build Status](https://travis-ci.com/opencycle/opencycle.svg?branch=master)](https://travis-ci.com/opencycle/opencycle) [![codecov](https://codecov.io/gh/opencycle/opencycle/branch/master/graph/badge.svg)](https://codecov.io/gh/opencycle/opencycle) [![StyleCI](https://github.styleci.io/repos/146082121/shield?branch=master)](https://github.styleci.io/repos/146082121) 
[![GitHub](https://img.shields.io/github/license/opencycle/opencycle.svg)](https://github.com/opencycle/opencycle/blob/master/LICENSE)

An open source free classified ads platform.

## Requirements

Opencycle is written in [Laravel](https://laravel.com/docs/5.7/installation#server-requirements) 5.7 so the requirements are the same:

* PHP >= 7.1.3
* Composer
* Database (eg: MySQL, PostgreSQL, SQLite)

## Installation

The easiest way to install and configure Opencycle is with Git and the built in installer.

```bash
$ git clone git@github.com:opencycle/opencycle.git .
$ composer install
$ php artisan opencycle:install
```

For more information and other methods please see the [Installation Instructions](https://github.com/opencycle/opencycle/wiki/Installation) on the Wiki.

## Contributing

We encourage pull requests from anyone. To do so, please fork and clone this repo.
You work should then be done on a new feature branch. Once ready please
[submit a pull request](https://github.com/opencycle/opencycle/compare/)
with your changes.

Once Travis has passed we will try to review your request as soon as possible.

Please keep in mind:

* Write tests
* Follow the PSR-2 style guide
* Add a detailed commit message

For more information please see the [Development Instructions](https://github.com/opencycle/opencycle/wiki/Development) of the Wiki.

## License

Opencycle is released under the [GPLv3 license](LICENSE)

## Feature Roadmap

 #### First release
 
 * General
   * SEO - social metadata, page titles
   * Error pages
   * Style emails
   * Search
   * TOS/Privacy policy - cms?
   * Social logins
   * Multi language?
   * Queues
 * Groups
   * Member count on group page
   * Group files and links?
   * User group settings
   * Create a group
 * Posts
   * Post types, wanted/offered
   * Image uploads
   * Report a post
   * Post expiry and post/image deletion
 * Admin/moderation area
   * Post approval
   * Member approval
   * Group approval
   * Group timezone
   * Group description WYSIWYG editor
   * Hotwords to force post moderation

#### Phase 2

 * Moderator email address
 * Invite users to group
 * Admin posts
 * Web installer - https://github.com/rashidlaasri/LaravelInstaller

