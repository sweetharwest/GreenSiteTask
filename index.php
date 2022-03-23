<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">

  <title>greensite_test_task</title>

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="ajax.js"></script>
  <link href="style.css" rel="stylesheet" type="text/css"/>
 

</head>

<body>
    <div id="result_form" class = "qwerty"></div>
    <br>
    <form method="post" id="ajax_form" action="" >
        <h2>Регистрация</h2>
        <p><input type="text" placeholder="Ваше имя" name="name"></p>
        <p><input type="text" placeholder="Ваша фамилия" name="surname"></p>
        <p><input type="text" placeholder="Ваш email" name="email"></p>
        <p><input type="password" placeholder="Введите пароль" name="password1"></p>
        <p><input type="password" placeholder="Повторите пароль" name="password2"></p>
        <p><input type="button" id="btn" value="Отправить"></p>
    </form>

</body>
</html>