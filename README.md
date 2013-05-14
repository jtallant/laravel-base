# Laravel Base

This is a Laravel4 application that comes with some basic configuration. I created it to match my preferred setup when starting a new Laravel4 app. It may or may not fit your preference.

Here is what it provides on top of a typical Laravel installation.

1. local environment config with default database as sqlite
1. [Command line generators by Jeffrey Way](https://github.com/JeffreyWay/Laravel-4-Generators)
1. [Laravel-Guard](https://github.com/JeffreyWay/Laravel-Guard) for asset management/minificaton and automatic testing. Configured for LESS. I don't use it for auto compiling LESS because I prefer less.js for auto refresh. I manually compile my LESS files using lessc before I deploy. I use Guard mostly just for automatic testing, you can configure it however you want. It can compile minify and combine SASS/LESS/COFFEE automatically. *Requires ruby 1.9.2 or higher and rubygems*
1. PageController for serving static pages
1. Root route to pages/home
1. HTML5 application layout file
1. Applicaton view folder for storing partials used across all/most of your app
1. Bootstrap Framework with Font Awesome Icons
1. LESS CSS/LESS.JS configured to auto refresh if environment is local
1. [Bower](https://github.com/bower/bower) for front end package management

## Requirements
* [composer](https://github.com/composer/composer)
* PHP >= 5.3.7
* MCrypt Extension

## Installation
1. Clone this repo
1. ```composer install``` from project root
1. ```composer install --dev``` from project root
1. Open up ```bootstrap/start.php``` and change ```exec('hostname')``` to your actual hostname. Try typing ```hostname``` into a terminal to find your hostname.
1. Delete the .git file and ```git init``` so you can create your own repo (optional)
1. ```artisan serve```

## Laravel4 Resources
[Docs](http://four.laravel.com)  
[Composer](http://getcomposer.org/doc/)  
[Tutorials](http://net.tutsplus.com/tag/laravel/)

Want to manage PHP via git? [Check this out](https://github.com/josegonzalez/homebrew-php)

