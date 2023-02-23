<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## Instalation Instructions

Laravel Offers various installation ways 

-[Installation Instrusctions](https://laravel.com/docs/10.x).

Personaly I used a combination of vagrant and virtual box, you can find here the installation instructions for my method https://dev.to/ko31/installing-laravel-homestead-on-macos-5910
After pulling the project, we need to create the .env file and copy the content of the .env.example into it, and we need to run the php artisan key:generate command.

## About the Project

For the auth system I used the laravel native one. Laravel authentication is very robust and offers out of the box verificaton by email.

All the db migration files are under database/migrations for the likes table I used the polymorphic relationship so if we scale the app we can use the Like mechanism from various other models. I created also some db seeders to create dummy data to test the application  we just have to run php artisan migrate --seed.

The Like Mechanism:
We have the Like model under app/Models/Like 
the Like interface under app/Contracts/likeable.php
and the like traits under app/Concerns.
I created two traits so any model can easily use the implementation. In our case the user was the model that could like the movies so for that reason the User model is usin the hasLikeable model.
The movies model is extending the like inserface and use the haslikes trait. Because of that implementation we can access all the needed information instantly and is easier if we need to change stuff moving on.
for example to get the likes of a movie we just need to use $movie->likes() and now we have all the movies with likes. We use the eloquent orm at is fulliest and we save time from using complicated sql expresions.

The functionality to add movies is under the user model since movies belongs to users. I kept the movie as simple as possible and user need to add only title and description to create a movie.

The application routes are under routes/web.php. I used a web route to sort the movies instead of a forntend solution.

All the other functionality of the application is inside app/Http/Controllers and the views files are under resources/views/





## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.
