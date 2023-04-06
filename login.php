<?php
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";

if (isset( $_POST ) and $_SERVER["REQUEST_METHOD"]=="POST") {
    
    $password = md5($_POST["password"]);

    $sql = "SELECT * FROM users WHERE login='" . $_POST["username"] . "' AND password='" . $password . "'";

    $result = $connect->query($sql);

    if ($result -> num_rows > 0) {
        $user = mysqli_fetch_assoc($result);

        if ($user["verifided"] ==1) {
            echo "Пользователь найден";    
        }else {
            echo "Подтвердите свою почту";
            echo "<p>
                    <a href='/repeat_send_mail.php'>Повторная отправка письма</a>
                </p>";
        }
        
    }else{
        echo "ERROR!";
    }

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
</head>

<body>

<form method = "POST">

<p>Username<br/>
	<input type = "text" name = "username">
</p>
<p>Password<br/>
	<input type = "password" name = "password">
</p>
 <button type="submit">Log In</button>
</form>

</body>
</html>
