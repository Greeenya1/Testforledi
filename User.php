
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
Класс Users
Создает пользователя и записывает его в БД с помощью конструктора,
если к констукторе задан один параметр, то выбирает пользователя из БД по id.
Методы класса позволяют удалять пользвателя, выводить пользователя с отформатированными данными
дня рождения и пола (в зависимости от параметров метода formatUser().
*/
class Users
{
    protected $id;
    protected $name;
    protected  $surname;
    protected  $birthday;
    protected  $gender;
    protected  $city;
    protected $arr;
    public function __construct()
    {
        $num = func_num_args();
        if ($num == 5) {
            $this->arr = array(
                'name'     => func_get_arg(0),
                'surname'  => func_get_arg(1),
                'birthday' => func_get_arg(2),
                'gender'   => func_get_arg(3),
                'city'     => func_get_arg(4),
            );
            $this->newUser(
                $this->arr['name'],
                $this->arr['surname'],
                $this->arr['birthday'],
                $this->arr['gender'],
                $this->arr['city']
            );
        } elseif ($num == 1) {
            $this->arr = array('id' => func_get_arg(0));
            $sql = "SELECT * FROM users WHERE id = :id";
            $stmt = db::connToDB()->prepare($sql);
            $stmt->bindValue(":id",$this->arr['id'], PDO::PARAM_STR);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }


    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE id = :id;";
        $stmt = db::connToDB()->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function newUser($name, $surname, $birthday, $gender, $city)
    {
        $this->name = preg_replace('#\d#', '', $name);
        $this->surname = preg_replace('#\d#', '', $surname);
        $this->birthday = $birthday;
        $this->gender = $gender;
        $this->city = $city;
        $sql = "INSERT INTO users(name, surname, birthday, gender, city) VALUES(:name, :surname, :birthday, :gender, :city)";
        $stmt = db::connToDB()->prepare($sql);
        $stmt->bindValue(":name", $this->name, PDO::PARAM_STR);
        $stmt->bindValue(":surname", $this->surname, PDO::PARAM_STR);
        $stmt->bindValue(":birthday", $this->birthday, PDO::PARAM_STR);
        $stmt->bindValue(":gender", $this->gender, PDO::PARAM_STR);
        $stmt->bindValue(":city", $this->city, PDO::PARAM_STR);
        $stmt->execute();
    }

    private static function fullAge($birthday)
    {
       return floor((time() - strtotime($birthday)) / (60*60*24*365));
    }

    private static function genderFind($gender)
    {
        if ($gender == 1) {
            $gender = 'муж';
        } elseif ($gender == 0) {
            $gender = 'жен';
        }
        return $gender;
    }

    public function formatUser($id, $form_gender = null)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = db::connToDB()->prepare($sql);
        $stmt->bindValue(":id",$id, PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        $res['birthday'] = self::fullAge($res['birthday']);
        if (isset($form_gender)) {
            $res['gender'] = self::genderFind($res['gender']);
        }
        $obj = new stdClass();
        foreach ($res as $key => $item) {
            $obj->$key = $item;
        }
        var_dump($obj);
    }

}
