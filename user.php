<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'link.php' ?>
    <link rel="stylesheet" href="user.css">
    <title>Document</title>
</head>
<body>
    <?php include_once 'header.php' ?>

    <?php

    if(isset($_POST["lName"]) && isset($_POST["fName"]) && isset($_POST["Email"]) &&
    isset($_POST["Comment"]) && isset($_POST["Topping"])) 
    {
        $nname = ($_POST["lName"]);
        $surname = ($_POST["fName"]);
        $email = ($_POST["Email"]);
        $topping = ($_POST["Topping"]);
        $comment = $_POST["Comment"];
        


    } else {
        echo "Произошла ошибка ";
    }
    
    if ( isset($_FILES["picture"]) && $_FILES["picture"]['error'] == 0)
    {
        $name = "upload/" . $_FILES["picture"]["name"];
        move_uploaded_file($_FILES["picture"]["tmp_name"], $name);

        
        //echo "Файл загружен";
        
    } else {
        echo "Произошла ошибка при загрузке файла.";
    }
    
    setcookie('name', $name, time()+60);
    setcookie('surname', $surname, time()+60);
    setcookie('email', $email, time()+60);

    if (!isset($_COOKIE['name']) && !isset($_COOKIE['surname']) && !isset($_COOKIE['email']))
    {
        setcookie('name', $name, time()+60);
        setcookie('surname', $surname, time()+60);
        setcookie('email', $email, time()+60);

    }
    ?>

<main class="main">
        <div class="main-container">
            <h2 class="order">Ваш заказ</h2><br>
            <p>Имя: <?php echo $nname; ?></p>
            <p>Фамилия: <?php echo $surname; ?></p>
            <p>Почта: <?php echo $email; ?></p>
            <p>Начинка: <?php echo $topping; ?></p>
            <p>Ваши пожелания: <?php echo $comment; ?></p>
            
        </div>
    </main>

    

    <?php include_once 'footer.php' ?>
</body>
</html>


