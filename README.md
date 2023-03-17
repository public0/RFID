# RFID - SGNL Developer Test

This is a developer test for SGNL, aimed at implementing a system that grants access to buildings based on an RFID token.

## Assumptions

1. Access is granted based on the user's department, meaning that any employee working in a given department can access any building associated with that department.
2. Each building has its own validation system, which means that each building has a copy of all the necessary data. When a new employee is hired, they are added directly to the central system, or the building system sends the information to the central system, which then propagates the new employee's data to all the buildings.
3. The director and the company headquarters are considered as departments.

## Installation

PHP version 8.1.12
MYSQL 10.7.3

To install and run the project, follow these steps:

1. Clone the repository: 
```git clone git@github.com:public0/RFID.git```

2. Create a new database by running the following command inside the DB client: 
```CREATE DATABASE SGNL;```

Note that the database configuration file is located in `bootstrap/app.php`, so you may need to modify it to change the DB connection.
3. Install the project's dependencies using Composer. The project comes with a local `composer.phar` file, so run: 

```php composer.phar install```

4. Run the PHP built-in web server by running the following command inside the project folder: 

```php -S localhost:8000```

(you can use a different port number if needed).
5. Initialize the database by going to `http://localhost:8000/public/migrate` using CURL, POSTMAN, or any browser.
6. Finally, test the endpoint by accessing `http://localhost:8000/public/check?token=142594708f3a5a3ac2980914a0fc954f`

## Dependencies Notes
I did use some libraries, namely 
```
{
"autoload": {
    "psr-4": {
        "App\\": "app/"
    }
},
"autoload-dev": {
    "psr-4": {
        "Tests\\": "tests/"
    }
},
    "require": {
        "illuminate/database": "^10.3",
        "psr/container": "^2.0"
    },
    "require-dev": {
        "phpunit/phpunit": "^10"
    }
}
```
1. Illuminate/database being eloquent
2. psr/container i did a minimal implementation of a container
3. in the test it said "List of your test cases and data" so not being sure what that meant i did 2 really small unit tests on the check endpoint

## SCHEMA
Should be visible in the Wiki Pages or <a href="https://github.com/public0/RFID/wiki">Here</a>. Image is hosted for 3 weeks after that it will be deleted by the hosting providers.

That's it! You should now have the system up and running.
