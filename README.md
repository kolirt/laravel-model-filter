# Laravel Model Filter 

## Installation
```
$ composer require kolirt/laravel-model-filter
```
```
$ php artisan model-filter:install
```
Configure config on config/model-filter.php path.

## Example

##### User model
You need to use the Kolirt\ModelFilter\Filterable trait
```php
<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kolirt\ModelFilter\Filterable;

class User extends Authenticatable
{
    use Notifiable, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

```

##### User model filter
You need to create a model filter
```php
<?php

namespace App\Models\Filters;

use Illuminate\Database\Eloquent\Builder;

class UserFilter
{

    public function q(Builder $query, $value)
    {
        $query->where('name', 'LIKE', '%' . $value . '%');
    }

}
```

### Controller
```php
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function index(Request $request)
    {
        User::filter([
            'q' => 'q'
        ])->get();

        // equal

        User::where('name', 'LIKE', '%q%')->get();
    }

}
```