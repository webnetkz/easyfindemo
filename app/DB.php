<?php

    // Данные для подключения к базе данных
    $driver = 'mysql';
    $host = 'srv-pleskdb28.ps.kz:3306 ';
    $db_name = 'webnetkz_easyfin';
    $db_user = 'webnetkz_easyfin';
    $db_pass = 'fepipe7611!!QQ';
    $charset = 'utf8';
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    try{
        // Создание обьекта PDO и передача данных
        // для подключения в конструктор класса
        $pdo = new PDO(
                        "$driver:host=$host;
                        dbname=$db_name;
                        charset=$charset",
                        $db_user,
                        $db_pass,
                        $options
                    );
    // Отладка ошибок подключения
    }catch(PDOException $e) {
        die('Ошибка подключения к базе данных');
    }
