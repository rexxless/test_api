# Инструкции по запуску
Перед первым запуском скопируйте в терминал следующее:
```shell
git clone https://github.com/rexxless/testapi.git
cd testapi/backend
cp .env.example .env
# Далее, редактируйте .env для вашего проекта
```

Для первого запуска проекта необходимо скопировать в терминал следующее:
```shell
cd ../deploy
ln -s ../backend/.env .env
docker-compose up -d --build
docker exec backend composer install
docker exec backend php artisan key:generate
docker exec backend php artisan jwt:secret
docker exec backend php artisan migrate
```

Для заполнения БД тестовыми данными необходимо ввести следующую команду:
```shell
docker exec backend php artisan db:seed
```

Для всех последующих запусков достаточно скопировать в терминал следующее:
```shell
cd testapi/deploy
docker-compose up -d
```

Ошибки:
<ul>
<li>Код 201 при получении списка отелей</li>
<li>Код ошибки 418 при ошибке “Доступ запрещен”</li>
<li>Отсутствие валидации ссылки на сайт отеля</li>
<li>Пользователь без админ-прав может удалять отели</li>
<li>Отсутствие валидации верхней границы названия отеля при создании</li>
<li>Не работает создание отеля (/api/hotels POST)</li>
<li>Не работает выход из аккаунта</li>
<li>Код 200 при создании отеля</li>
<li>Нативная ошибка Laravel при просмотре конкретного отеля</li>
</ul>

Данные для входа:<br>

Пользователь:
* Почта: user@example.com
* Пароль: password

Админ:
* Почта: admin@example.com
* Пароль: QWEasd123
