# products-api

[API Platform Crash Course - Complete 3 Hour Course](https://www.youtube.com/watch?v=ZRBRtA_2NAo&ab_channel=GaryClarke) de *Gary Clarke*

## Commands

**Installation**

```
composer create-project symfony/skeleton products-api
```

**Serve**

```
php -S localhost:8000 -t public

symfony serve -d --no-tls

symfony server:stop
```

**Packages**

```
composer require api
composer require symfony/maker-bundle --dev
composer require doctrine/annotations
```

**Cache**

```
php bin/console cache:clear
```

**Database**

```
bin/console doctrine:database:create
```

**Migrations**

```
bin/console doctrine:schema:validate

bin/console make:migration

bin/console doctrine:migrations:diff
bin/console doctrine:migrations:diff --from-empty-schema

bin/console doctrine:migrations:migrate
```