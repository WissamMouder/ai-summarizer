<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
# AI Summarizer Application Using the Groq API

This app is  an AI Automation web application built with Laravel 12 that generates concise summaries from long texts using the Groq API and the #Llama 3.3 70B Versatile model. The application includes a secure authentication system powered by #Laravel Breeze, allowing users to register, log in, and securely access the summarization interface.

## Features

* AI-powered text summarization
* User authentication with Laravel Breeze
* Secure login and registration
* Responsive interface
* Copy generated summaries
* Character counter

## Technologies

* Laravel 12
* PHP 8.2
* Laravel Breeze
* Blade
* HTML, CSS, JavaScript
* Groq API
* Llama 3.3 70B Versatile

## Installation

```bash
git clone https://github.com/WissamMouder/ai-summarizer.git
cd ai-summarizer
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run dev
php artisan serve
``

Configure your API key in `.env`:

```env
GROQ_API_KEY=your_api_key_here
```

## Demo Application 


https://github.com/user-attachments/assets/b11e482d-41af-48e9-9b3c-6d43d8811bec

