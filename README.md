## Installing

- Install the composer

```
curl -sS https://getcomposer.org/installer | php
```

- Edit composer.json

```
{
    "require": {
        "zeuxisoo/slim-eloquent": "0.1.0"
    }
}
```

- Install/update your dependencies

```
php composer.phar install
```

## Usage

- Create database config

```
$app->config('databases', [
    'default' => [
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => 'production',
        'username'  => 'root',
        'password'  => '',
        'charset'   => 'utf8',
        'collation' => 'utf8_general_ci',
        'prefix'    => ''
    ]
]);
```

- Add the middleware into slim application

```
$app->add(new Zeuxisoo\Laravel\Database\Eloquent\ModelMiddleware);
```

## Note

- If you want multiple database connection, you can change the config like:

```
$app->config('databases', [
    'default' => [
       'driver'    => 'mysql',
       'host'      => 'localhost',
       'database'  => 'production',
       'username'  => 'root',
       'password'  => '',
       'charset'   => 'utf8',
       'collation' => 'utf8_general_ci',
       'prefix'    => ''
   ],
   'testing' => [
       'driver'    => 'mysql',
       'host'      => 'localhost',
       'database'  => 'testing',
       'username'  => 'root',
       'password'  => '',
       'charset'   => 'utf8',
       'collation' => 'utf8_general_ci',
       'prefix'    => ''
   ]
]);
```

- In the application, You can set the connection like:

```
// Default connection
$connectionDefault     = $app->db->getConnection();
$connectionDefaultUser = $connectionDefault->table('user')->find(1);

// Testing connection
$connectionTesting     = $app->db->getConnection('testing');
$connectionTestingUser = $connectionTesting->table('user')->find(1);

// Model like
$modelDefaultUser = User::find(1);
$modelTestingUser = User::on('testing')->find(1);
```

Want more information? Please see the `examples` directory.
