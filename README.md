# Virtual Conference [ Dev Exercise #2 ] 

3-page website to register for a virtual conference with a CRUD admin panel. Built with [HALT Stack](https://haltstack.dev/)

## Getting Started
These instructions will give you a copy of the project and running on your local machine for development and testing purposes. 

### Prerequisites
To run this project locally, you need:

- **PHP** >= 8.1.17
- **Laravel** >= 10.3.1
- **Composer** >= 2.5.4 

*You can find the installation instructions for these dependencies on their respective websites.*

## Installing
**Clone the repo**
```
git clone https://github.com/k-karina-n/conference-ex-2.git
```

**Rename .env.example file to .env inside a project root and fill the following database information** 
```
DB_USERNAME= 
DB_PASSWORD= 
```

**Open the console and go to a project root directory**
```
cd conference-ex-2
```

**Create dependencies**
```
composer install
composer dump-autoload
```

**Generate an application encryption key** 
```
php artisan key:generate
```

**Run database migrations** 
```
php artisan migrate
```

**Seed database with admin data** ['email' => 'admin@example.com', 'password' => 'adminadmin']
```
php artisan db:seed
```

**Install packages and bundle application's assets**
```
npm i
npm run build
```

**Run project**
```
php artisan serve
```
