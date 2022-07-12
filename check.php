<?php
    require_once 'db.php';
    $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);

    if(mb_strlen($login)<5 || mb_strlen($login)>90) {
        echo "The long of login is not succes";
        exit();
    } 
    
    echo "Congratulations on registering. There's not much left. Please check your email :)";

    $headers = "From: IT-CO.RU \r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $subject = 'Письмо по поводу регистрации на сайте IPSUM';
    
    $message    = "Здравствуйте! Спасибо за регистрацию на ipsum.ru\nВаш логин: ".$login."\n
            Перейдите по ссылке, чтобы создать пароль учётной записи и активировать ваш аккаунт:\nhttp://itco/password.php";
    mail($login, $subject, $message, "Content-type:text/html; Charset=utf-8\r\n");
    $mysql->query("INSERT INTO `users_login` (`login`) VALUES('$login')");

    $mysql->close();
?>