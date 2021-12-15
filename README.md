
<img src="https://banners.beyondco.de/Records.png?theme=light&packageManager=composer+require&packageName=lase-peco%2Frecords&pattern=yyy&style=style_1&description=Record+the+activities+in+your+project&md=1&showWatermark=0&fontSize=125px&images=folder-open"/>

# Record the activities in your Laravel project.
***

The ``lase-peco/records`` is a simple library to record all kind of activities inside your Laravel
project. It has practical functions to record the activities in your project.
the records will be stored in the ``records`` table.


## Installation

You can install the package via composer:

```bash
composer require lase-peco/records
```
after installing the package you can create the ``records`` table by running the migrations:

```php 
php artisan migrate
```
## Usage

The simplest way to use the package is to use the included helper function ``record()``:

```php
record('Oh, Something happened here!') // yes, that simple!
```
You can fetch all the records using the Model ``LasePeCo\Records\Models\Record``

```php
use LasePeCo\Records\Models\Record;

Record::all();
```

Now an advanced example:

```php
record()
    ->by($aModel)
    ->onSubject($aModel)
    ->properties(['someProperty' => 'someValue'])
    ->message('Oh, Something happened here!');
```

You can retrieve the following from a record:
 
```php
use LasePeCo\Records\Models\Record;

$record = Record::all()->last();

$record->subject; //returns an instance of an eloquent model
$record->causer; //returns an instance of an eloquent model
$record->properties; //returns an array ['someProperty' => 'someValue']
$record->message; //returns 'Oh, Something happened here!'
```

When a record was created and the causer was not provided, then by default the authenticated user will be added as a causer for the record.
If there is no authenticated user, then the causer will be null.

Optionally you can save the ``IP`` of the request in your record by chaining the ``withIp()`` method on the helper function ``record()``.
the IP will be anonymized and saved in the record.l

```php

record('Oh, Something happened here!')->withIp();

use LasePeCo\Records\Models\Record;

$record = Record::all()->last();

$record->ip // return 12.214.31.***
```

## Testing

``` bash
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email a.dabak@lase-peco.com instead of using the issue tracker.

## Credits

- [Ahmed Dabak](https://github.com/lase-peco)
- [All Contributors](CONTRIBUTING.md)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
