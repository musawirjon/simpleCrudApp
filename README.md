# simpleCrudApp
A simple crud app featured ['user', 'posts', 'comments'] , Authentication, Authorizations, and an email service while adding comments

# Basic App

1: It has login / register using starter template of laravel 9 (breeze v-1.13)

2: User then can create posts, Posts will be listed under dashboard under login

3: User can create post, and comments

4: Upon adding comments an email notification will be sent to same user

5: Comments and posts are only be visible to those who have created posts and can add comment into it 

6: For now  this is a basic app, I will extand it's features time to time

7: Repository design pattern isn't used, I will be covering it in upcomming commits.

# installation Instructions

clone repository

copy .env.example to .env

Add database credentials into .env

DB_USERNAME=

DB_PASSWORD=

run below commands

composer install

php artisan migrate
