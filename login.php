<?php
include('config.php');
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = $connection->prepare("SELECT * FROM usuarios WHERE NombreUsuario=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<p class="error">Username password combination is wrong!</p>';
    } else {
        if (password_verify($password, $result['Contrasena'])) {
            $_SESSION['ID_Usuario'] = $result['ID'];
            header ("Location: pagpincipal.html");
        } else {
            echo '<p class="error">Username password combination is wrong!</p>';
        }
    }
}
?>