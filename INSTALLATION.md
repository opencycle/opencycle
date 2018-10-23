## Installation

First either git clone the repository with Git.
       
```bash
$ git clone git@github.com:opencycle/opencycle.git .
```

Or alternatively download and extract the latest package
from the [releases](https://github.com/opencycle/opencycle/releases) page.

```bash
$ wget https://github.com/opencycle/opencycle/archive/master.zip
$ unzip opencycle-master.zip
```

#### Composer

Then you will need to also install and run [Composer](https://getcomposer.org/) to install the dependencies.

```bash
$ composer install
```

## Configuration

#### Installer

The easiest way to configure Opencycle is with the built in installer.

```bash
$ php artisan opencycle:install
```

#### Manually

Of if you want you can configure it manually.

First you will need to generate an application key and link the storage directory.

```bash
$ php artisan key:generate
$ php artisan storage:link
```

Then copy `.env.example` to `.env` and modify the values for your setup.

Finally you need to seed your database with required initial data.

```bash
$ php artisan db:seed
```

Also to set up the daily digest emails you will need to install a crontab entry.

```bash
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```
