<?php
    require_once 'db.php';

    $pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
    if(mb_strlen($pass)<5 || mb_strlen($pass)>90) {
        echo "The long of password is not succes";
        exit();
    } 
    
    $mysql->query("INSERT INTO `users_password` (`password`) VALUES('$pass')");
    echo "Congratulation :)";

    $mysql->close();
    $new_url = 'http://itco/newindex.php';
    header('Location: '.$new_url);
    
?>