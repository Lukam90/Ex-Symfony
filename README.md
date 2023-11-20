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
```

**Database**

```
bin/console doctrine:database:create
```