# shoemagick
PHP Library for working with shoes

### Installation
``` php
composer require half2me/shoemagick
```

### Usage:
``` php
// In your php script

use ShoeMagick\Converter\Converter;

// ..

$converter = new Converter;
echo 'EU size of US 9.5 is: ' . $converter->from('us')->to('eu')->convert('9.5', 'Men');
```
