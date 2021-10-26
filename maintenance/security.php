<?php


require_once '../config/connect.php';




$sql = "SELECT email FROM users";
$users = query($sql);



foreach ($users as $user) {
    $security = sha1($user['email']);
    $sql = "UPDATE users SET security='" . $security . "' WHERE email='" . $user['email'] . "'";
    if ($mysqli->query($sql) === true) {
        echo "('" . sha1($user['email']) . "')";
        echo "<br>";
    }
}
