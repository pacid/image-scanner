# image-scanner
A simple script to scrap a page in search of images and their dimensions


##Usage:

composer install  
php src/Index.php <url>  

i.e.:  
```php src/Index.php https://en.wikipedia.org/wiki/Great_Pyrenees``` 

The script will return a JSON with a list of elements
 * full URL
 * width of the image
 * height of the image