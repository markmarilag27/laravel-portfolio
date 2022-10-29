## Developers
How to get started working on this project is below.
### Requirements
To run this application you need to have:
- [PHP](https://www.php.net/releases/8.1/en.php) Version: `^8.1`
- Exif PHP Extension
- GD PHP Extension
- Imagick PHP Extension
- BCMath PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- Fileinfo PHP extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension


### Official and third-party libraries
List of used packages:

- [Laravel Sanctum](https://laravel.com/docs/9.x/sanctum) for SPA authentication.
- [Laravel Telescope](https://laravel.com/docs/9.x/telescope) provides insight into the requests coming into your application, exceptions, log entries, database queries, queued jobs, mail, notifications, cache operations, scheduled tasks, variable dumps, and more.
- [Laravel DynamoDB](https://github.com/kitar/laravel-dynamodb) is a DynamoDB based Eloquent model and Query builder for Laravel.
- [S3 Driver Configuration](https://laravel.com/docs/9.x/filesystem#s3-driver-configuration) The S3 driver configuration information is located in your `config/filesystems.php` configuration file. This file contains an example configuration array for an S3 driver. You are free to modify this array with your own S3 configuration and credentials. For convenience, these environment variables match the naming convention used by the AWS CLI.
- [Laravel IDE Helper Generator](https://github.com/barryvdh/laravel-ide-helper) to generate accurate autocompletion.
- [Laravel Pint](https://laravel.com/docs/9.x/pint) is an opinionated PHP code style fixer for minimalists. Pint is built on top of PHP-CS-Fixer and makes it simple to ensure that your code style stays clean and consistent.
- [Psalm](https://psalm.dev/docs/) is a static analysis tool that attempts to dig into your program and find as many type-related bugs as possible.


### Laravel Coding Standard
You can now run the test simply typing
<pre><code>./vendor/bin/pint</code></pre>

### Static Analysis Tool
Psalm helps people maintain a wide variety of codebases – large and small, ancient and modern. On its strictest setting it can help you prevent almost all type-related runtime errors, and enables you to take advantage of safe coding patterns popular in other languages.
<pre><code>./vendor/bin/psalm</code></pre>

### Laravel IDE Helper
This package generates helper files that enable your IDE to provide accurate autocompletion. Generation is done based on the files in your project, so they are always up-to-date.
<pre><code>php artisan ide-helper:generate</code></pre>
I recommend to use this with VSCode extension called [Laravel Intellisense](https://marketplace.visualstudio.com/items?itemName=mohamedbenhida.laravel-intellisense)

### Getting Started
Clone the repository
```
$ git clone git@github.com:markmarilag27/laravel-portfolio.git
```
Copy and edit environment file
```
$ cp .env.example .env
```
Run to build the app container
```
$ docker compose build app
```
Run to boot up development, create minio bucket, dynamodb table and composer install and etc.
```
$ bash ./run-start.sh
```
Enter on container shell
```
$ bash ./run-exec-container.sh
```
### Finding bugs on your code
Run this script before commit
```
$ bash ./run-before-commit.sh
```
### Mailhog
For viewing local email [Mail & Local Development](https://laravel.com/docs/9.x/mail#mail-and-local-development)
```
http://localhost:8025
```
### Laravel telescope
```
http://localhost/telescope
```
### Dynamodb Admin UI
```
http://localhost:8001
```
### Minio UI
```
http://localhost:9000
```
