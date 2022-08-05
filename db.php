<?php
/**
 * Автор: Никита Гринфельд
 *
 * Дата реализации: 04.08.2022 12:00
 *
 * Дата изменения: 06.08.2022 00:30
 *
 * Утилита для работы с базой данных phpMyAdmin */


/**
Класс DB
Формирует подключение к БД
 */
class DB {
    const USER = 'root';
    const PASS = '';
    const HOST = 'localhost';
    const DB = 'ledi';

    public static function connToDB() {
        $user = self::USER;
        $pass = self::PASS;
        $host = self::HOST;
        $db = self::DB;

        $conn = new PDO("mysql:dbname=$db;host=$host", $user, $pass);
        return $conn;
    }
}
