<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'link.php' ?>
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<body>
    <?php include_once 'header.php' ?>
    <?php 
    session_start(["use_strict_mode" => true]);
    if (isset($_SESSION['username'])) {
        echo 'Вы вошли как ' . $_SESSION['username'] . '<br>';
        echo '<a href="auth.php?logout=1">Выйти</a>';
      } else {
        ?>

    <main class="main">
        <div class="main-container">
            <h2 class="login">Вход</h2>
            <form action="auth.php" method="post" class="form">
                <input class="login-input" type="text" name="login" id="login" placeholder="Логин" require>
                <input class="login-input" type="password" name="password" id="password" placeholder="Пароль" require>
                <button class="login-input">Вход</button>
            </form>
        </div>
    </main>

    <?php 
      }

      
      unset($_SESSION['message']);
      if (isset($_SESSION['error'])) {
        echo 'Ошибка: ' . $_SESSION['error'] . '<br>';
        unset($_SESSION['error']);
      }
    
    ?>

      

    <?php include_once 'footer.php' ?>
</body>
</html>
