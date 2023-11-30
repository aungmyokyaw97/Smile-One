# Smile One API
[SmileOne](https://www.smile.one/)
## About
This package is specifically designed for the [Smile.one](https://www.smile.one/) , offering a simple and efficient method to purchase Smile One products using Laravel.
## Installation
```shel
composer require aungmyokyaw/smile-one
```
## Configuration
You will need to publish the configuration file to your application. You can do this using the following command:
```shel
php artisan vendor:publish --tag="smileone-config"
```
After publishing the package's configuration file, you will find the file at `config/smileone.php`. You will need to fill out the necessary data in this file to use the package.
## Usage samples