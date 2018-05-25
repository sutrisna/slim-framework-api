# REST API with Slim Framework 3

A RESTful API boilerplate for Slim micro-framework. Features included:

- Protect route using jwt
- Generate token
- CRUD

## Getting Started
First, clone the repo:
```bash
$ git clone https://github.com/sutrisna/slim-framework-api.git
```

#### Install dependencies
```
$ cd <project_folder>
$ composer install
```
#### Running app
```
php -S localhost:8080 -t public public/index.php
```

#### Setting database
```
In folder src
Open file settings.php
```

```php
'db' => [
            'database_type' => 'mysql',
            'database_name' => 'dev',
            'server' => 'localhost',
            'username' => 'root',
            'password' => ''
        ]
```

### API Routes
#### Endpoint http://localhost:8080
| HTTP Method	| Route | Parameters | Desciption  |
| ----- | ----- | ---- |------------- |
| GET      | /secret/generate | - | Generate token
| GET     | /user/get | headers { Authorization : token } | Get all user
