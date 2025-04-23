<?php

//вызов трассировку БД
use DB;
DB::enableQueryLog();

dump(DB::getQueryLog());


//Запрос explane по индексам пример
EXPLAIN SELECT * FROM `users_news` WHERE `id` > 73795; 

/*
Отправка почтовых сообщений через очереди. Отправка самой очереди
Можно указать чтобы ожидания новых заданий не было, запустив воркер вот так:
*/

php artisan queue:work --stop-when-empty

/*
Или так:
*/

php artisan queue:work --once


/*
Самый простой способ иметь рабочую очередь — это запускать воркер периодически с выходом при пустой очереди. Через CRON!
Поступаем по тому же принципу как с выбором драйвера: "этот инструмент нам всё равно нужен, так что просто добавим в него новую функцию".

crontab может выглядеть так:
*/

* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1

*/2 * * * * cd /path-to-your-project && php artisan queue:work --stop-when-empty >> /dev/null 2>&1




