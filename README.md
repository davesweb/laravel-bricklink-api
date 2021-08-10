# Laravel Bricklink API
This pacakge is a Laravel wrapper for the `davesweb/bricklink-api` package. It adds a config file for your Bricklink credentials, a service provider which registers everything correctly for dependency injection, and an autodiscover to the `davesweb/bricklink-api` package. Other functionality stays the same. 

## Installation
Via composer:
`composer require davesweb/laravel-bricklink-api`

After installation, publish the config file with `php artisan vendor:publish --provider="Davesweb\\LaravelBicklinkApi\\ServiceProvider"`.

## Configuration
This package needs 4 new environment variables:

```
BRICKLINK_CONSUMER_KEY=
BRICKLINK_CONSUMER_SECRET=
BRICKLINK_TOKEN_VALUE=
BIRCKLINK_TOKEN_SECRET=
```

You can find the values for these in your Bricklink account.

## Usage
This package takes care of the configuration of the API connection so you can inject or resolve the repository classes directly in your Laravel application.

Example 1: Inject category repository in your controller:
```php
<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Davesweb\BricklinkApi\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    public function index(CategoryRepository $repository): Renderable
    {
        $categories = $repository->index();
        
        return view('categories.index', [
            'categories' => $categories,
        ]);
    }
}
```

Example 2: Inject repository in your controller and use value objects and transformers:
```php
<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Contracts\Support\Renderable;
use Davesweb\BricklinkApi\Repositories\CouponRepository;
use Davesweb\BrinklinkApi\Transformers\CouponTransformer;

class CouponController extends Controller
{
    public function store(StoreCategoryRequest $request, CouponRepository $repository): Renderable
    {
        $coupon = CouponTransformer::toObject($request->validated());
        
        $newCoupon = $repository->store($coupon);
        
        return redirect()->back()->with('success', 'Succesfully created the new coupon.');
    }
}
```

For documentation on how to use the repositories and value objects please refer to the [davesweb/bricklink-api](https://github.com/davesweb/bricklink-api) package.
