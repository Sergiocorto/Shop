<?php
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";

if (isset( $_POST ) and $_SERVER["REQUEST_METHOD"]=="POST") {
    $sql = "SELECT * FROM users WHERE email='" . $_POST["email"] . "'";
    $result= $connect->query($sql);
    $user = mysqli_fetch_assoc($result);
    
    if ($user["verifided"] == 1) {
        echo "Пользователь уже верифицирован";
    }else {
        $link = "<a href='http://shopweb.zzz.com.ua/register.php?u_code=" . $user['confirm_mail'] . "'>Confirm</a>";
        mail($_POST["email"], "Repeat mail", $link);
        echo "Письмо отправлено, проверьте почту";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Repeat Send Mail</title>
</head>

<body>

<form method = "POST">
<p>Email<br/>
	<input type = "text" name = "email">
</p>
 <button type="submit">Send mail</button>
</form>

</body>




</html>
