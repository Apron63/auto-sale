Основано на сборке Symfony 5 development with Docker
https://dev.to/martinpham/symfony-5-development-with-docker-4hj8

1. Клонируем репозиторий
git clone https://github.com/Apron63/auto-sale
cd auto-sale
cd docker
docker-compose up -d
   
2. Применяем миграции БД
- правим права на доступ к каталогу БД и каталогам для временных файлов
sudo chmod 777 database -R
sudo chmod 777 ../src/public -R
sudo chmod 777 ../src/var -R
  
- запускаем контейнер PHP
docker-compose exec php-fpm /bin/sh (Вариант для WSL2)
docker-compose exec php-fpm -it bash (Вероятно это для Linux)
  
- запускаем миграции БД
  (правильный вариант - php bin/console doctrine:migrations:migrate)
  но что то пошло не так (( поэтому несколько "упростим" задачу
php bin/console doctrine:schema:update --force
  Эта команда принудительно обновит схему БД
  
- заливаем в БД тестовые фикстуры
php bin/console doctrine:fixtures:load

3. Проверяем корректность работы, запустив в браузере - localhost
Если все прошло правильно, отобразится 2 поля с выбором типа документа и дальнейшего действия
Реализовано - выгрузка документа в PDF, вывод имени файла с документом, непосредственно 
 отображение документа в браузере, отправка на front в бинарном виде.
   
Для работы с PDF форматом использован пакет
https://packagist.org/packages/qipsius/tcpdf-bundle
