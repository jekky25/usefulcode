<?
//composer команды

//обновить ларавел с пакетами
composer update -W

//иногда update не срабатывает, можно переустановку сделать с версией php
composer-php8.1 install

//Для хостинга бегет, новый композер от версии 2 и выше. При установке в папку и адпейте сайта с терминала из админки хостинга
php8.1 ~/.local/bin/composer install