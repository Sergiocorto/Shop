<?php

$sqlUser = "SELECT * FROM users WHERE id =" . $row["user_id"];

$resultUser = $connect->query($sqlUser);
$user = mysqli_fetch_assoc($resultUser);
?>