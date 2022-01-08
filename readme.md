# Subscription Platform RESTful APIs

Simple subscription platform in which users can subscribe to a website. Whenever a new post is published on a particular website all it's subscribers will receive an email with the post title and description.

## Prerequisites

-   PHP >= 7.4|8.1
-   Composer PHP OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON
-   MySql >= 5.7

## Built With

-   [Laravel](https://laravel.com/docs/8.x) - v8.x

### Installing

Clone repository and install dependencies with composer.

```
git clone git@github.com:ianautiyal/subscription-platform-api.git
cd subscription-platform-api
composer install
composer run-script post-root-package-install
composer run-script post-create-project-cmd
```

Update a database and mail credentials .env

### Running App

```
php artisan migrate
php artisan queue:work
php artisan serve
```

### Geneate Dummy Data

```
php artisan db:seed
```

### Geneate API Documentation

```
php artisan scribe:generate
```

### Publish Post Manually

```
php artisan publish:post :id
```

## Authors

-   [**Ajay Nautiyal**](https://github.com/ianautiyal)
