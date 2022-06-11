## About Project

 company has multiple departments and each employee works in one of the departments. Each employee may have multiple contact numbers and addresses:

 ## How To Run

 1. Clone the repo and run below command:- <br />
     composer install

2. Add database details in .env file create .env from .env.example  

3. Run migration to create database:- <br />
    php artisan migrate

4. Run Passport install for personal access client:- <br />
    php artisan passport:install

5. Run api endpoints in api client and run server:- <br />
    php artisan serve