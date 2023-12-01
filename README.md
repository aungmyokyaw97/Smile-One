# Smile One API
[SmileOne](https://www.smile.one/)
## About
This package is specifically designed for the [Smile.one](https://www.smile.one/) , offering a simple and efficient method to purchase Smile One products using Laravel.
Note - Currently, this package is intended for Mobile Legends Product from [SmileOne](https://www.smile.one/)
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
```php

    SmileOne::setProduct(#ProductName)->getProductList(); // Get Product Points List
    // Replace '#ProductName' with your actual product name.
    // Example : SmileOne::setProduct('mobilelegends')->getProductList();
    
    SmileOne::setProduct(#ProductName)->getPoints(); // Get Total Available SmilePoints With Product
    
    SmileOne::setProduct(#ProductName)->getProduct(); // Get Main Product
      
    SmileOne::setProduct(#ProductName,#ProductId)->setUser(#UserID,#UserZoneID)->checkProductPoints(); // Check Points with User ID
      
    SmileOne::setProduct(#ProductName,#ProductId)->setUser(#UserID,#UserZoneID)->purchase(); // Product Purchase

```
