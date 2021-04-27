# Race & Bet application
### Content management system application with LARAVEL

CRUD (create/read/update/delete) application.
This app is built with Laravel framework. 

## Project features
- Admin is able to login and logout;
- After login, admin can navigate through pages;
- Admin can manage projects table: add/delete/update project data;
- Admin can manage employees table: add/delete/update employee data and assign project to the employee;
- Admin can filtering bettors by horses name;
- Admin can search bettors by name or surname;

## Installation & Configuration
1. Clone this git repository;
2. Use AMPPS or other open-source platform;
3. Create new schema 'lenktynes' in your database; 
4. Go to **.env.example** file and configure Database:
DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br> 
DB_DATABASE=lenktynes<br> 
DB_USERNAME=root<br>
DB_PASSWORD=mysql<br>
5. Run **php artisan migrate** to create tables.
6. To open project, run **php artisan serve** and follow the link.
7. To login add e-mail: **admin@admin.com** password: **admin@admin.com**.

## How does it looks like


## Authors
[Ineta](https://github.com/InetaVei)
