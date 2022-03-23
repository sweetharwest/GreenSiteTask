<?php

//создаю объект User для заполнения базы данных
class User{
    public $id;
    public $name;
    public $email;
    
    public function __construct($id, $name, $email){
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }
}

$user1 = new User(1,'andrew','andrew@mail.com');
$user2 = new User(2,'alex','alex@mail.com');
$user3 = new User(3,'max','max@mail.com');

//Создаю маасив пользователей
$users = array($user1,$user2,$user3);

//Произвожу валидацию данных 
if (empty($_POST["name"]) || empty($_POST["surname"]) || empty($_POST["email"]) || empty($_POST["password1"]) || empty($_POST["password2"]) ) 
{ 
    logger("не все поля заполнены");
    $result = array('text' => "вы ввели не все поля", 'suc' => 0);
}elseif(!stripos($_POST["email"], '@') && $_POST["email"] != '@')
    {
        logger("в поле email отсутствует '@'");
        $result = array('text' => "в email нет @", 'suc' => 0);
    }
    elseif($_POST["password1"] != $_POST["password2"])
    {
        logger("несоответствие паролей");
        $result = array('text' => "пароли не совпадают", 'suc' => 0);
    }
    else
    {
        $flag = false;
        foreach($users as $user)
        {
            if($user->email == $_POST["email"]) $flag = true;
        }
        if($flag)
        {
            logger("email уже зарегестрирован");
            $result = array('text' => "такой email уже зарегестрирован", 'suc' => 0);

        }else
        {
            $result = array('text' => "регистрация прошла успешно", 'suc' => 1);
        }

    }   
echo json_encode($result); 

//Функция логирования 
function logger($text)
{
    $log = date('Y-m-d H:i:s  ') . $text;
    file_put_contents('log.txt', $log . PHP_EOL, FILE_APPEND);
}

?>