### Simple Laravel CRUD operations

#### Installation
##### 1. Clone application
```shell script
$ git clone https://github.com/obiefy/employees-demo.git
```
##### 2. Install dependencies
```shell script
$ composer install
```
##### 3. Create .env file
```shell script
$ cp .env.example .env
```
##### 4. Generate application key
```shell script
$ php artisan key:generate
```

##### 4. Migrate and Seed the database
```shell script
$ php artisan db:migrate --seed
```

##### 4. Serve the project on port 8080
```shell script
$ php artisan serve --port=8080
```
