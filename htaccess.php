<?
//команды htaccess (в основном редиректы и обработка адресов)

//редирект с index.php, index.html, index.htm на морду
RewriteEngine On
RewriteBase /
RewriteRule ^(.*)index\.php$ $1 [R=301,L]
Redirect /index.html / 
Redirect /index.htm /