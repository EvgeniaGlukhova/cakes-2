<?php
    session_start(["use_strict_mode" => true]);
    unset($_SESSION['message']);
    if (isset($_POST['login'])){
        if ($_POST['login'] == 'cakes'){
            if ($_POST['password'] == '2004'){
                $_SESSION['username'] = $_POST['login'];
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
