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
The dafault region is Brazil.
## Usage samples
```php

    SmileOne::setProduct(#ProductName)->getProductList(#Region); // Get Product Points List
    // Replace '#ProductName' with your actual product name.
    // If left empty, it will default to the Brazil region.
    // Example : SmileOne::setProduct('mobilelegends')->getProductList();
    // Example for different region : SmileOne::setProduct('mobilelegends')->getProductList('ph');
    
    SmileOne::setProduct(#ProductName)->getPoints(#Region); // Get Total Available SmilePoints With Product
    
    SmileOne::setProduct('mobilelegends')->getProduct(#Region); // Get Main Product
      
    SmileOne::setProduct(#ProductName,#ProductId)->setUser(#UserID,#UserZoneID)->checkProductPoints(#Region); // Check Points with User ID
      
    SmileOne::setProduct(#ProductName,#ProductId)->setUser(#UserID,#UserZoneID)->purchase(#Region); // Product Purchase




```
