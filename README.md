# Chatbot App

## Getting Started

A chatbot that receives specific orders from users and reply accordingly. Bot is able to perfom currency exchage given their code.

### Prerequisites

What things you need to install the software and how to install them

```
Composer
```

Clone the current repository

```
https://github.com/cristianalmanzar/currency-bot.git
```


Install composer dependencies

```
composer install
```

Create a .env file or rename .env.example to .env

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=default
DB_USERNAME=default
DB_PASSWORD=secret

CURRENCY_API_KEY=# API KEY FROM https://www.amdoren.com/currency-api/
```

Run commands to create database structure and initial data for currencies

```
php artisan migrate --seed
```

Then

```
php artisan serve
```

##  For Docker Container Configuration

### Prerequisites
```
Docker
```

### Docker Configuration


```
1 -  docker-compose up -d --build
2 -  docker exec -ti container_name php artisan migrate
3 -  docker exec -ti php artisan db:seed
```






