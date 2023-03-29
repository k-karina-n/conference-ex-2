# Virtual Conference [ Dev Exercise #2 ] 

3-page website to register for a virtual conference with a CRUD admin panel. 

## Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites
What things you need to install the software and how to install them.
Give examples

## Installing
- **Clone the repo**
```
git clone git@bitbucket.org:wappdev/study-koval-ex-2.git
```

- **Rename .env.example file to .env inside a project root and fill the following database information** 
```
DB_USERNAME= 
DB_PASSWORD= 
```

- **Open the console and go to a project root directory**
```
cd study-koval-ex-2
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

**Run project**
```
php artisan serve
```
