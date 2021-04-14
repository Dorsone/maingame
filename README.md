## Game Zone

- Боевой сайт []()

- Демостенд [game-zone.polyarix.com](https://game-zone.polyarix.com/)


## Технологии

Laravel 8 [Документация](https://laravel.com/docs).

Админ панель Bbackpackforlaravel [Документация](https://backpackforlaravel.com/).

Фронт собирается gulp

---

## Кратенько про работу с сайтом

#### Обновление
```
git pull

composer  install

php artisan migrate --force

npm i

gulp build

php artisan cache:clear
```

#### Создание новых разделов в админке

1. Создаем миграцию
   ```
   php artisan make:migration {название миграции}
   ```
2. Выполняем миграцию
   ```
   php artisan migrate
   ```   
3. Создаем файлы для админки
   ```
   php artisan backpack:crud {название модлуля (обычно как таблица)}
   ```
4. Настраиваем отображение полей, связей и прочего в
    * Контроллере
      > app/Http/Controllers/Admin/{название модуля}CrudController.php
    * Модели
      > app/Models/{название модуля}.php
    * Реквесте
      > app/Http/Requests/{название модуля}Request.php
    * В меню админки
      > resources/views/vendor/backpack/base/inc/sidebar_content.blade.php
