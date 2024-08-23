<?
//команды htaccess (в основном редиректы и обработка адресов)

//редирект с index.php, index.html, index.htm на морду
RewriteEngine On
RewriteBase /
RewriteRule ^(.*)index\.php$ $1 [R=301,L]
Redirect /index.html / 
Redirect /index.htm /


//Работа сайта через папку public для ларавел, чтобы не вносить настройки на сервере
RewriteEngine On
RewriteRule ^(.*)$ public/$1 [L] 