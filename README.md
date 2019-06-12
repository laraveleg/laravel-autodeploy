# Komicho Laravel AutoDeploy
Deploy project after pushed commits.
> Support `gitlab` for now.

### Install via composer
```
$ composer require komicho/laravel-autodeploy
```

### Publish vendor
- Run `php artisan vendor:publish`
- Selection `Komicho\Laravel\AutoDeploy\ServiceProvider`

### Config file
Go to `config/komicho/autodeploy.php`
- You can specify the name of the branch you want to pull from:- `'branch_remote' => 'master'`
- You can specify some tasks to run after pull:- 
```php
'tasks' => [
     //
]
```

## Integrations with gitlab
Publishing projects from the repositorie on gitlab.

### URL (webhook):-
You can use url `<BASE_URL>/komicho/deploy/gitlab`

### Secret Token
Add a value you choose but you must add this value in a .env file
```env
KAP_TOKEN=<SECRET_TOKEN>
```