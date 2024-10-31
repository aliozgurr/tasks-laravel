Task Assignment Case
---

## Overview
Retrieve tasks from provider API's and assign them to developers based on the work days.

### Installation

- Clone the project to local repository.
- Copy `.env.example` file as `.env` file and fill needed parameters.
- Set database configuration on .env

```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=root
DB_PASSWORD=
```
- Run `composer install`
- Run `yarn install`
- Run `yarn dev` or `yarn build`

### Create Database Structure and Fill Data

````
php artisan migrate

php artisan db:seed
````

### Run Tests
```
php artisan test
```

## Retrieve Tasks
Run the following command on project directory to get tasks from provider API's.
```
php artisan retrieve-tasks-from-providers-command
```

## Assign Unassigned Tasks
Run the following command on project directory to assign unassigned tasks to developers.
New sprint will be created if there is no active sprint in this command.
```
php artisan assign-unassigned-tasks-command
```
