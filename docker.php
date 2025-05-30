<?
//docker команды

//перед инсталляцией докера включаем виртуализацию в БИОС




//запуск докера
docker-compose up -d

//стоп докера (лучше стопить непосредственно из программы)
docker-compose down

//ребилд докера после изменения параметров
docker-compose build

//запуск докера по названию контейнера
docker run -d -p 80:80 docker/getting-started

//список установленных убунт, где покаазана, какая из них используется по умолчанию
wslconfig /list

//установка нужной убунты по умолчанию
/setdefault Ubuntu-18.04

//перейти в папку убунты
cd \\wsl.localhost\Ubuntu-22.04\home\userName\projects\test2\

//зайти внутрь контейнера
docker exec -it project_app bash

//выйти из контейнера

командой exit

или клавиши
Ctrl + D

//меняем атрибуты файлов
sudo chmod 777 -R ./