# pangolin-sdk
let php developer easier to access toutian pangolin open api

Install the latest version with

```bash
$ composer require ydg/pangolin-sdk
```

## Basic Usage

```php
<?php

use Ydg\PangolinSdk\Pangolin;

$app = new Pangolin([
    'app_key' => 'your app_key',
    'app_secure' => 'your app_secure',
]);
$app->product->search();
```