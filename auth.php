<?php
    session_start(["use_strict_mode" => true]);
   
    unset($_SESSION['message']);

    if (isset($_POST['login'])){

        require_once 'dbconnect.php';

        $result = $db->query("SELECT * FROM cakes.\"Пользователь\" WHERE Логин = '".$_POST['login']."'");

        if ($row = $result->fetch())
        {
            if (MD5($_POST['password']) == $row['Пароль']){
                $_SESSION['username'] = $row['Логин'];
                header("Location: login.php");
                die();
            }
            else {
                $_SESSION['error'] = 'Вы ввели неправильный пароль!';
                header("Location: login.php");
                die();
            }

        }
        else {
            $_SESSION['error'] = 'Вы ввели неправильный логин!';
            header("Location: login.php");
            die();
        }

    }
     if ($_GET['logout'] == 1){
       session_unset();
        $_SESSION['exit'] = 'Вы успешно вышли из системы';
        header("Location: login.php");
        die();
     }
