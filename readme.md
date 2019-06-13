## Project Overview

* project name：laravel-adminlte
* Demo address：http://111.231.118.189:8888/admin
 Demo account/password：admin/123456

laravel-adminlte Is a simple background management system infrastructure

## Function is as follows
- Menu management
- Background user management
- Role management
- authority management

## Operating environment requirements

- Nginx 1.8+
- PHP 5.6+
- Mysql 5.7+

## Development environment deployment/installation

This project code is developed using the php framework laravel5.4

### Basic installation

#### 1. Clone source code

clone `laravel-adminlte` Source code to local：

    git clone https://github.com/zzDylan/laravel-adminlte


#### 2. Install extension package dependencies

	composer update

#### 3. Generate configuration file

```
cp .env.example .env

php artisan key:generate
```

You can modify it according to the situation `.env` The contents of the file, such as database connection, cache, mail settings, seven cattle cloud storage, etc.:

```
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=XXX
DB_USERNAME=XXX
DB_PASSWORD=XXX

QINIU_DEFAULT_DOMAIN=XXX
QINIU_ACCESS_KEY=XXX
QINIU_SECRET_KEY=XXX
QINIU_BUCKET=XXX
```

#### 4. Generating data table

Run the following command in the root of the website

```shell
php artisan migrate
```

#### 5.Generate menu data and initial administrator data

```shell
php artisan db:seed
```


#### 6. Generate key

```shell
php artisan key:generate
```

