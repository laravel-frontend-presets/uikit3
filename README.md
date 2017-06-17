# Laravel 5.5.X Front-end Preset for UIKit 3 Beta

An automatic piece of middleware for Laravel 5.x, which will redirect users accessing non https urls, to the secure equivalent unless specified in the ignore list

Adds a preset for UIKit 3 scaffolding on new Laravel 5.5+ projects, will add individual SASS components and import the UIKit 3 core javascript.


## Usage

1- Install via composer `composer require owenmelbz/uikit3-preset`

2- The package should use laravels new auto discovery, if not however you can manually register the service provider - typically done inside the `app.php` providers array e.g `OwenMelbz\UIKit3Preset\UIKit3PresetServiceProvider::class`

3- Run `php artisan preset uikit3`

4- *Optional* You can then run something like the vuejs or react presets also

## Warning

This replaces the default laravel auth scaffolding, so if you want to revert to bootstrap, you'll need to run `artisan make:auth` again to overwrite it.

## Why?

Bootstrap has outlived its welcome creating generic designs and is lacking in many features required for modern web builds, UIKit 3 has a great eco-system and feature rich making it a perfect modular framework, allowing you to require just what you need.
