Запуск приложения:
1. Клонируйте репозиторий.
2. Подключите базу данных в файле .env.
3. Выполните миграции и заполнение данных сидерами: `php artisan migrate --seed`.

Готово! Теперь вы можете проверить приложение.

Для фильтрации запросов необходимо указать параметр `status` со значением 'pending', 'active' или 'completed'.
