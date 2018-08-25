# Opencycle 

[![GitHub release](https://img.shields.io/github/release/opencycle/opencycle.svg)](https://github.com/opencycle/opencycle/releases)
 [![Build Status](https://travis-ci.com/opencycle/opencycle.svg?branch=master)](https://travis-ci.com/opencycle/opencycle) [![codecov](https://codecov.io/gh/opencycle/opencycle/branch/master/graph/badge.svg)](https://codecov.io/gh/opencycle/opencycle)

An open source free classified ads platform.

## Server Requirements

Opencycle is written in [Laravel](https://laravel.com/docs/5.6/installation#server-requirements) 5.6 so the requirements are the same:

* PHP >= 7.1.3

## Installation

Either git clone the repository

```bash
$ git clone git@github.com:opencycle/opencycle.git .
```

Or download and extract the latest package from the [releases](https://github.com/opencycle/opencycle/releases) page.

Then you will need to install and run [Composer](https://getcomposer.org/) to install the dependencies.

```bash
$ composer install
```

## Configuration

First you will need to generate an application key.

```bash
$ php artisan key:generate
```

Then copy `.env.example` to `.env` and modify the values for your setup.
