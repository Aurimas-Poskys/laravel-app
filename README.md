<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Getting started

## About The Project

Super simple application for a teacher to assign students to groups for a project.

## Technical decisions

Since this project is not about design, but more about functionality, custom CSS was avoided. For styling Bootstrap v5 was used.

<hr>

When the database is connected and the application is started teacher should be able to see only homepage in which he can create project. There is a middleware "EnsureProjectIsCreated" added, which checks whether the project is created, and if not, redirects to the homepage.

<hr>

About relations:

Project has "One To Many" relationship with Groups;
Groups has "One To Many" relationship with Students;

<hr>

When creating a new student, the full name entered must meet the following requirements:
- Atleast 6 letters;
- Not more then 30 letters;
- Has to be unique;
- At least two words.

<hr>

When assigning student to group, jquery event "on change" is used, and when it is triggered ajax request is executed.

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker). 

Clone the repository

    git clone https://github.com/Aurimas-Poskys/laravel-app.git

Switch to the repo folder

    cd laravel-app

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file (DB_DATABASE, DB_USERNAME, DB_PASSWORD)

    cp .env.example .env

Generate a new application key

    php artisan key:generate


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/Aurimas-Poskys/laravel-app.git
    cd laravel-app
    composer install
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve


# Testing functionality

Run automated tests

    php artisan test