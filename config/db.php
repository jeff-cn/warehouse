<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=localhost;port=5432;dbname=warehouse',
    'username' => 'postgres',
    'password' => 'postgres', // обязателен, пустой может не сработать
//    'autoConnect' => false, // не устанавливать соединение при старте приложения - для оптимизации
    'charset' => 'utf8',

];
