# Laravel-Taggy
An Eloquent tagging package for Laravel Framework.

### Installation

Install the package via composer
```shell
$ composer require owllog/laravel-taggy
```

Add laravel-taggy service provider to config/app.php
```php
/*
 * Package Service Providers...
 */
Owllog\LaravelTaggy\LaravelTaggyServiceProvider::class,
```

### Usage
Add Taggable trait to your models:
##### Example:
```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Owllog\LaravelTaggy\Traits\Taggable;

class Lesson extends Model
{
    use Taggable;
}
```

Find Lesson and add tags to it:
```php
$lesson = Lesson::find(38);

$lesson->tag(['velit', 'Rerum', 'dolorem', 'quo']);
```

To Get A Lesson Tags: [This relation available via taggable trait]
```php
$lesson = \App\Lesson::find(1);
$lesson->tags();
```
