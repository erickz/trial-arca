Project made with Laravel 8, PHP 8.0 and MYSQL 5.7

# Installation
## Dependencies
```composer install```

## Migrations
```php artisan migrate```

## Seeders
```php artisan db:seed```

code.jquery.com/jquery-compat-git.js'>

# Usage
## Set up assets 
```npm run dev```

## Elasticsearch
- To enable or disable the Elasticsearch in the application set a boolean value for the config: `services.search.enabled`;
- Install Elasticsearch;
- Start Elasticsearch;
- Create an index for Elasticsearch called `companies` (if It doesn't exist already) with the following command: `curl PUT http://localhost:9200/companies`;
- Run `php artisan search:reindex-elastic` to create the indexes from the database;

## Future Improvements
- Make the updates of indexes with queues in order to improve the implementation of Elasticsearch;
- Add masks to the inputs;
- Create automated tests to the application;