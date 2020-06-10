# LaravelEG Laravel AutoDeploy
Deploy project after pushed commits.

### Install via composer
```
$ composer require laraveleg/laravel-autodeploy
```

### Publish vendor
- Run `php artisan vendor:publish`
- Selection `LaravelEG\Laravel\AutoDeploy\ServiceProvider`

### Config file
Go to `config/laraveleg/autodeploy.php`
- You can specify the name of the branch you want to pull from:- `'branch_remote' => 'master'`

## Add webhook
You can add webhook to route file `like routes/api.php`
```php
Route::prefix("laraveleg")->group(function () {
    LaravelEG\Laravel\AutoDeploy\WebHook::init();
});
```

## Integrations with git repository
Publishing projects from the repository.

### URL (webhook):-
You can use url `<BASE_URL>/api/laraveleg/deploy/<LARAVELEG_AUTODEPLOY_TOKEN>`
> Do not use web routes

`LARAVELEG_AUTODEPLOY_TOKEN` It is the secret token in LARAVELEG_AUTODEPLOY_TOKEN value inside `.env` file

### Secret Token
Add a value you choose but you must add this value in a .env file
```env
LARAVELEG_AUTODEPLOY_TOKEN=<SECRET_TOKEN>
```

### Git bar
Can enbale show git bar you wint add new middleware in app/Http/Kernel.php file
```php
\LaravelEG\Laravel\AutoDeploy\App\Http\Middleware\LastCommitMiddleware::class
```
> This feature does not work in production mode