# Blader

This is a Laravel-based web application. It has youtube-like features, such as video uploading, commenting, and liking. It also has a user authentication system.

## Demo

https://vimeo.com/922141269?share=copy

## Requirements

- PHP >= 7.3
- Composer
- Node.js & npm/Yarn
- MySQL

## Installation

1. Clone the repository:

```sh
git clone https://github.com/username/repository.git
```

2. Install php dependencies:

```sh
composer install
```

3. Install npm dependencies:

```sh
npm install && npm run build
# or
yarn install
```

4. Create a new database and configure the `.env` file:

```sh
cp .env.example .env
```

5. Generate the application key:

```sh
php artisan key:generate
```

6. Run the migrations:

```sh
php artisan migrate
```

7. Run the server:

```sh
php artisan serve
```

## Testing

```sh
php artisan test
```
