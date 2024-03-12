### Laravel 8 Tech Blog
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
+ **Like Feature for News**: Each user can like a news article only once and can also remove their like if desired. Likes are exclusive to users; guests can only view the total number of likes.
+ **Comment Feature for News**: Users have the ability to create, edit, and delete comments on news articles. Users are only permitted to modify or delete their own comments. Comments can only be added by users; guests have read-only access to comments.
+ **Search News on the Search Page**: Users can search for news articles by title on the search page. Search results are sorted based on the number of likes each article has received.
+ **Sort News by Update Time or Like**: Users can sort news articles by either their update time or the number of likes they have accumulated.


## Screenshots
![Main page sideshow image](https://github.com/isaackk60/techBlog/blob/main/imagesReadme/main_page.jpg) <br/>
![Main page show recent news image](https://github.com/isaackk60/techBlog/blob/main/imagesReadme/main_page_2.png) <br/>
![News page image](https://github.com/isaackk60/techBlog/blob/main/imagesReadme/News_page.png) <br/>
![Search page image](https://github.com/isaackk60/techBlog/blob/main/imagesReadme/search_page.jpg) <br/>
![Like button image](https://github.com/isaackk60/techBlog/blob/main/imagesReadme/like_button.png) <br/>
![Comments image](https://github.com/isaackk60/techBlog/blob/main/imagesReadme/comments.png)


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
For any questions, suggestions, or conspiracy theories you'd like to share, feel free to reach out to us at:<br/>
Email: (isaac97663396@gmail.com)

## Reference

This tech blog is referenced from [this github repository](https://github.com/MeabhG97/laravel-blog.git)

This repository is linked to [this youtube video](https://www.youtube.com/watch?v=HKJDLXsTr8A&t=4710s) where I show you how to create a complete blog in Laravel 8 using best practices.

•	Author: Code With Dary <br>
•	Twitter: [@codewithdary](https://twitter.com/codewithdary) <br>
•	Instagram: [@codewithdary](https://www.instagram.com/codewithdary/) <br>

## Contributing
Do not hesitate to contribute to the project by adapting or adding features ! Bug reports or pull requests are welcome.


