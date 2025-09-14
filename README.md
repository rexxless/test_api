# Инструкции по запуску
<h3>Перед первым запуском скопируйте в терминал следующее:</h3>

```shell
git clone https://github.com/rexxless/test_api.git
cd test_api/backend
cp .env.example .env
# Далее, редактируйте .env для вашего проекта
```

<h3>Для первого запуска проекта необходимо скопировать в терминал следующее:</h3>

```shell
cd ../deploy
ln -s ../backend/.env .env
docker-compose up -d --build
docker exec backend composer install
docker exec backend php artisan key:generate
docker exec backend php artisan jwt:secret
docker exec backend php artisan migrate
```


<h3> Для заполнения БД тестовыми данными необходимо ввести следующую команду: </h3>

```shell
docker exec backend php artisan db:seed
```

<h3> Для всех последующих запусков достаточно скопировать в терминал следующее: </h3>

```shell
cd test_api/deploy
docker-compose up -d
```

<h2>Полный список ошибок:</h2>
<ul>
<li>Код 201 при получении списка отелей</li>
<li>Код 200 при создании отеля</li>
<li>Код ошибки 418 при ошибке “Доступ запрещен”</li>
<li>Отсутствие валидации ссылки на сайт отеля</li>
<li>Пользователь без админ-прав может удалять отели</li>
<li>Отсутствие валидации верхней границы названия отеля при создании</li>
<li>Не работает создание отеля (/api/hotels POST)</li>
<li>Не работает выход из аккаунта</li>
<li>Нативная ошибка Laravel при просмотре конкретного отеля</li>
</ul> 

<h2>Данные для входа:<br> </h2>

<h3>Пользователь: </h3>

* Почта: user@example.com
* Пароль: password

<h3> Админ:</h3>

* Почта: admin@example.com
* Пароль: QWEasd123






