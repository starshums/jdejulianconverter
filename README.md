# :clipboard:  Oracle JD Edwards Julian date converter for Laravel 5

A Laravel library that converts a given Oracle JD Edwards Julian date to the standard Gregorian date.  
Date fields in JD Edwards are stored in the Julian format where the date format is CYYDDD  
For more information on this format please visit this [page](https://docs.oracle.com/cd/E26228_01/doc.93/e21961/julian_date_conv.htm)

## :grey_question: Installation

Require this package in your composer.json and update composer.

```bash
composer require starshums/jdejulianconverter
```
and then update composer :
```bash
composer update
```
After updating composer, add the ServiceProvider to the providers array in config/app.php
```php
starshums\jdejulianconverter\JDEJulianConverterServiceProvider::class,
```
You also need to add the alias. Add this to your aliases:
```php
'JJC' => starshums\jdejulianconverter\JDEJulianConverter::class,
```

## :open_book: Usage

```php
$converter = new \JJC;
$date = $converter->Convert(110123); // expected result : 2010-05-03
```

## :handshake: Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## :page_with_curl: License
[MIT](https://opensource.org/licenses/MIT)
