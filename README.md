# GatorWordle2

*This is an updated version of https://github.com/adGators/gatorwordle (updated to Laravel 11)*

This project is a clone of the popular game [Wordle](https://www.nytimes.com/games/wordle/index.html).

This is a [Laravel](https://laravel.com/docs/9.x) PHP project that uses SQLite3, [Laravel Jetstream](https://jetstream.laravel.com/2.x/introduction.html), [Inertia JS](https://inertiajs.com/), and [Vue.js](https://vuejs.org/).

## Development Environment

You will need a development environment for PHP 8.3 and Node JS for building frontend assets. You can use whatever 
environment you like, however, if you don't have one set up already Laravel has several good options:

- [Herd](https://laravel.com/docs/11.x/installation#local-installation-using-herd) (Very easy to get up and running)
- [Sail](https://laravel.com/docs/9.x/sail) (uses Docker - higher learning curve, but good to know. What we use at AdGators)

The environment you choose doesn't matter, as long as you can serve PHP 8.3 and Vue JS applications

## Project Setup

Inside your development environment:

1. Clone this repository
2. Install PHP dependencies `composer install`
3. Install frontend dependencies `npm install`
4. Create your .env file by copying the example `cp .env.example .env`. Update settings as necessary
5. Migrate and seed DB `php artisan migrate`
6. Seed DB `php artisan db:seed`

*Note* - open the config file `config/sanctum.php` and verify the domain you are running the site from locally 
is listed in the `stateful` setting. If it's not, set it in your .env file: `SANCTUM_STATEFUL_DOMAINS=yourdomain`

## Running

To run the frontend, use the command:

```
npm run dev
```

This will automatically recompile as you make changes to the Javascript and CSS files.

How you access the site will be dependent on your development environment.

A single user is seeded in the database that you can use login. 

- u: dev@adgators.com
- p: password

## Debugging

Make sure you have [Vue DevTools](https://chrome.google.com/webstore/detail/vuejs-devtools/nhdogjmejiglipccpnnnanhbledajbpd?hl=en) installed to help with debugging.

## Running tests

This project only has server-side tests. To run these tests, simply run the following command in your development environment:

```
php artisan test
```
