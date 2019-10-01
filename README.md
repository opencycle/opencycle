# Opencycle

[![GitHub release](https://img.shields.io/github/release/opencycle/opencycle.svg)](https://github.com/opencycle/opencycle/releases)
 [![Build Status](https://travis-ci.com/opencycle/opencycle.svg?branch=master)](https://travis-ci.com/opencycle/opencycle) [![codecov](https://codecov.io/gh/opencycle/opencycle/branch/master/graph/badge.svg)](https://codecov.io/gh/opencycle/opencycle) [![StyleCI](https://github.styleci.io/repos/146082121/shield?branch=master)](https://github.styleci.io/repos/146082121)
[![GitHub](https://img.shields.io/github/license/opencycle/opencycle.svg)](https://github.com/opencycle/opencycle/blob/master/LICENSE)
[![](https://images.microbadger.com/badges/image/opencycle/opencycle.svg)](https://hub.docker.com/r/opencycle/opencycle/)

> Please note this project is still under development so bugs are likely and there is no stable release at the moment. See the [roadmap](#feature-roadmap) for progress.

An open source classified ads platform.

## Requirements

Opencycle is written in [Laravel](https://laravel.com/docs/5.7/installation#server-requirements) 5.7 so the requirements are the same:

* PHP >= 7.1.3
* Composer
* Database (eg: MySQL, PostgreSQL, SQLite)

## Installation

There are several methods to install Opencycle, however the easiest way is via the command line.

```bash
$ git clone git@github.com:opencycle/opencycle.git .
```

You will then also need to install and run [Composer](https://getcomposer.org/) to install the dependencies.

```bash
$ composer install --no-dev
```

And then either [Yarn](https://yarnpkg.com/lang/en/) or [NPM](https://www.npmjs.com/get-npm) to compile the assets.

```bash
$ yarn install && yarn production
or
$ npm install && npm run production
```

#### Release Package

Alternatively you can download and extract the latest `opencycle.zip` package
from the [releases](https://github.com/opencycle/opencycle/releases) page and upload it to your web server.

```bash
$ wget https://github.com/opencycle/opencycle/archive/master.zip
$ unzip opencycle.zip
```

This contains everything you need to begin [configuring](#configuration) your installation.

#### Docker Installation

We also provide a Docker image,
please see the [Docker installation instructions](https://github.com/opencycle/opencycle/wiki/Docker) in the wiki for more details.

## Configuration

To configure Opencycle you can use the bult in web installer. Once you have configured your web server visit the `/install` url to begin.

http://yourdomain.com/install

#### Manually

Of if you want more control you can configure Opencycle manually.
Please see the [manual configuration](https://github.com/opencycle/opencycle/wiki/Configuration) page in the wiki for more info.

## Contributing

For information on how to set up Opencycle for local development.
Please see the [development instructions](https://github.com/opencycle/opencycle/wiki/Development) in the Wiki.

We encourage pull requests from anyone. To do so, please fork and clone this repo.
You work should then be done on a new feature branch. Once ready please
[submit a pull request](https://github.com/opencycle/opencycle/compare/)
with your changes.

Once Travis has passed we will try to review your request as soon as possible.

Please keep in mind:

* Write tests
* Follow the PSR-2 style guide
* Add a detailed commit message

## License

Opencycle is released under the [GPLv3 license](LICENSE)

## Feature Roadmap

These are the features still to be developed for each planned release.

#### First alpha release

* General
  * SEO - social metadata, page titles
  * Error pages
  * Style emails
  * Search
  * TOS/Privacy policy - cms?
  * Social logins
  * Multi language?
  * Queues
  * Authenticate routes
  * Limit seeded countries to ones with enough data
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

#### First beta release

* Moderator email address
* Invite users to group
* Admin posts
* Web installer - https://github.com/rashidlaasri/LaravelInstaller
