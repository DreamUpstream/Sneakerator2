# About

Say hi to all-in-one sneaker reseller dashboard & investing
advisor - Sneakerator! Quickly search and analyse your favorite sneakers with our world’s most in depth online sneaker sales
listing and analyser tool.

# Features

### Seller dashboard

Never miss or forget your owned sneakers with having all details of
your bought and currently on-sale listings in
all-in-one seller dashboard.

### Analyse price trends

Receive latest sales data & market information so you could decide
if you should invest in the sneaker (or regret investing!).

### Find sales volume

Get real-time sneaker sales volumes in the most popular
sneaker reselling sites by using advanced API's that
provide you with in-depth market info, like bids and asks.

### Tokens system

API's that we are using do not like us unfortunately, so we have to keep our request count low. Therefore we have a token system that makes you think twice before spamming buttons!

# Used tech-stack:

- Laravel 9
- Vue 3 SPA + VueRouter + Pinia
- Pages with dynamic import and custom layouts
- Login, register, email verification and password reset
- Authentication with Breeze and Sanctum
- Bootstrap 5
- MySQL
- Docker
- Mailhog

# Installation

- docker-compose up -d
- npm install
- edit .env and set your database connection details and add mailhog login/port .env
- in container:
  composer update
  composer php artisan key:generate
  php artisan migrate:fresh --seed
- login to mailhog (default - mailhog:8100) for verification mails
