<?php
/**
 * Автор: Никита Гринфельд
 *
 * Дата реализации: 04.08.2022 12:00
 *
 * Дата изменения: 06.08.2022 01:00
 *
 * Утилита для работы с базой данных phpMyAdmin */

/**
* TODO:
* [*] Исправить метод getList() для получения экземпляров класса Users
* [*] Исправить метод deleteListUser() для удаления из БД с помощью экземпляров
*/

    if (class_exists('Users')){
/**
Класс ListUsers
Наследует класс Users, конструткор класса выбирает id всех пользователей из БД
и записывает их в массив $array. Метод deleteListUser() удаляет всех пользователей
БД по пходящему массиву id $this->array
 */
class ListUsers extends Users
{
    private $array = array();

    public function __construct()
    {
        $sql = "SELECT id FROM users";
        $stmt = db::connToDB()->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($res as $item) {
            foreach ($item as $value) {
                $this->array[] = $value;
            }
        }
    }

    public function getList()
    {
        foreach ($this->array as $item) {
            $sql = "SELECT * FROM users WHERE id = :id";
            $stmt = db::connToDB()->prepare($sql);
            $stmt->bindValue(":id", $item, PDO::PARAM_STR);
            $stmt->execute();
            $list[] = $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function deleteListUser()
    {
        $str = implode(', ', $this->array);
        $sql = "DELETE FROM users WHERE id IN ($str);";
        $stmt = db::connToDB()->prepare($sql);
        $stmt->execute();
    }


}
    } else {
        echo 'Класс не существует';
    }
