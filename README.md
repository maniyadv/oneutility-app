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
- Postman collection (with tests)
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
``
 


## Deployment

