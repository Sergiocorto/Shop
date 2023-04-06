<?php
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";

if (isset($_GET["u_code"])) {
    $sql = "SELECT * FROM users WHERE confirm_mail='" . $_GET["u_code"] . "'";
    $result= $connect->query($sql);

    if ($result->num_rows > 0) {
        $user = mysqli_fetch_assoc($result);
        $sql = "UPDATE `users` SET `confirm_mail` = '', `verifided` = '1' WHERE `users`.`id` =" . $user["id"];
        
        if ($connect->query($sql)) {
            echo "Пользователь верифицирован";
        }
    } 
}

if (isset( $_POST ) and $_SERVER["REQUEST_METHOD"]=="POST") {
    $password = md5($_POST["password"]);
    $u_code = generateRandomString(20);
	$sql = "INSERT INTO users(login, password, email, confirm_mail) VALUES ('" . $_POST["username"] ."', '" . $password . "', '" . $_POST["email"] . "', '" . $u_code . "')";
    
	if($connect->query($sql)){
        echo "Пользователь зарегистрирован";
        $link = "<a href='http://shopweb.zzz.com.ua/register.php?u_code=$u_code'>Confirm</a>";
        mail($_POST["email"], "Register", $link);
	}else{
        echo "ERROR!";
    }

}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registers</title>
</head>

<body>

<form method = "POST">

<p>Username<br/>
	<input type = "text" name = "username">
</p>
<p>Email<br/>
	<input type = "text" name = "email">
</p>
<p>Password<br/>
	<input type = "password" name = "password">
</p>
 <button type="submit">Resgister</button>
</form>

</body>




</html>
