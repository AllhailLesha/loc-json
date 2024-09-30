# Базовый стек для поднятия приложения на laravel

## Composer 
```dockerfile
docker-compose run  composer <command>
```

## Artisan 
```dockerfile
docker-compose run artisan <command>
```

## Инструкция

1. Клонируем репозиторий куда угодно
    ```
   git clone https://github.com/AllhailLesha/stackOnLaravel.git
   ```
2. Поднимаем все необходимые контейнеры
   ```dockerfile
   docker-compose up -d nginx
   ```
3. Nginx должен ответит по localhost:8000
4. Ставим laravel
   ```dockerfile
   docker-compose run composer create-project laravel/laravel .
   ```

Если возникнет подобная ошибка, надо дать права пользователя всему каталогу проекта sudo chown -R user:user <путь-до-каталога>
```
   Creating a "laravel/laravel" project at "./"
   https://repo.packagist.org could not be fully loaded (rename(/tmp/cache/repo/https---repo.packagist.org/packages.json.66fad859af7b65.37140140.tmp,/tmp/cache/repo/https---repo.packagist.org/packages.json): Operation not permitted), package information was loaded from the local cache and may be out of date
   Installing laravel/laravel (v11.2.0)
    Failed to download laravel/laravel from dist: /var/www/laravel/vendor/composer does not exist and could not be created: 
    Now trying to download from source
  - Syncing laravel/laravel (v11.2.0) into cache

```
5. Правим src/.env. Сюда пишутся данные из ./env/mysql.env
 ```
   DB_CONNECTION=mysql
   DB_HOST=mysql
   DB_PORT=3306
   DB_DATABASE=laravel_db
   DB_USERNAME=laravel
   DB_PASSWORD=password
```

6. Делаем миграцию 
```dockerfile
   docker-compose run artisan migrate
```

7. Если выдает подобную ошибку, то меняем порт для mysql в docker-compose.yml на какой-нибудь другой
```dockerfile
  SQLSTATE[HY000]: General error: 1030 Got error 168 - 'Unknown (generic) error from engine' from storage engine (Connection: mysql, SQL: create table `migrations` (`id` int unsigned not null auto_increment primary key, `migration` varchar(255) not null, `batch` int not null) default character set utf8mb4 collate 'utf8mb4_unicode_ci')

```


