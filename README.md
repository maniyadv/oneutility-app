# oneutility-app

Laravel App for APIs related to product and pricing

## Getting Started

Use following commands to get the project running

```$xslt
git clone https://github.com/maniyadv/oneutility-app.git
composer install
cp .env.example .env  # add mysql details in .env
php artisan migrate
php artisan key:generate
php artisan passport:install
php artisan db:seed
```


### Main Features

- Passport Authentication
- Postman collection (with API tests)
- Swagger UI Docs
- Exception Handling
- Form input validation
- Migration & Seeders
- Response Transformers


## Running the tests

Postman - For API testing via Postman, import postman collection in postman and check test
results for APIs in Tests tab of postman.

Laravel Tests - Run following commands

``
./vendor/bin/phpunit
``
 

## Deployment

Application deployed at -


[http://testoneutility-env.2yuhtyqmyd.us-east-1.elasticbeanstalk.com](http://testoneutility-env.2yuhtyqmyd.us-east-1.elasticbeanstalk.com)

API URL -

[http://testoneutility-env.2yuhtyqmyd.us-east-1.elasticbeanstalk.com/api/v1](http://testoneutility-env.2yuhtyqmyd.us-east-1.elasticbeanstalk.com/api/v1)


Postman Documentation URL -
[https://documenter.getpostman.com/view/298066/RztmsUy8](https://documenter.getpostman.com/view/298066/RztmsUy8)

(Environments are committed in codebase)

Swagger Docs
[http://testoneutility-env.2yuhtyqmyd.us-east-1.elasticbeanstalk.com/docs](http://testoneutility-env.2yuhtyqmyd.us-east-1.elasticbeanstalk.com/docs)

## Issues
1. In case of error
``1071 Specified key was too long; max key length is 767 bytes ``
Uncomment Line 28 in ``// Schema::defaultStringLength(191);`` in AppServiceProvider

2. Swagger execution requires fixes 
