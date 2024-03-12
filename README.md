## Laravel 8 Tech Blog
TechNewsWorld is an tech blog, your go-to source for the latest in technology news, trends, and insights from around the globe. At TechNewsWorld, we strive to provide you with timely and accurate information about the ever-evolving world of technology.

## Requirements
+	PHP 7.3 or higher <br>
+	Node 12.13.0 or higher <br>
+	Xampp or another MySQL Database client <br>

## Technologies / Programming Languages Used
+ Laravel 8
+ JavaScript
+ Tailwind CSS
+ MySQL
+ PHP

## Features
+ Add like to news
+ Add comments to news
+ Search News in search page
+ Sort News by update time or like


## Screenshots
![Main page sideshow image][]
![Main page show recent news image][]
![News page image][]
![Search page image][]
![Like button image][]
![Comments image][]


## Installation <br>
Setting up your development environment on your local machine: <br>
```
git clone git@github.com:codewithdary/laravel-8-complete-blog.git
cd laravel-8-complete-blog
cp .env.example .env
composer install
php artisan key:generate
php artisan cache:clear && php artisan config:clear
php artisan serve
```

## Before starting <br>
Create a database <br>
```
mysql
create database laravelblog;
exit;
```

Setup your database credentials in the .env file <br>
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravelblog
DB_USERNAME={USERNAME}
DB_PASSWORD={PASSWORD}
```

Migrate the tables
```
php artisan migrate
```

## Authors
Kim Fui Leung

## Contact
For any questions, suggestions, or conspiracy theories you'd like to share, feel free to reach out to us at:
Email: (isaac97663396@gmail.com)

## Reference

This tech blog is referenced from [this github repository](https://github.com/MeabhG97/laravel-blog.git)

This repository is linked to [this youtube video](https://www.youtube.com/watch?v=HKJDLXsTr8A&t=4710s) where I show you how to create a complete blog in Laravel 8 using best practices.

•	Author: Code With Dary <br>
•	Twitter: [@codewithdary](https://twitter.com/codewithdary) <br>
•	Instagram: [@codewithdary](https://www.instagram.com/codewithdary/) <br>

## Contributing
Do not hesitate to contribute to the project by adapting or adding features ! Bug reports or pull requests are welcome.


