<?php
    include_once('conexao.php');
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND pass = '$pass'";
    $resultado = mysqli_query($conexao, $sql);
    if (mysqli_num_rows($resultado) == 1) {
        session_start();
        $_SESSION['email'] = $email;
        header("location:cadastropeixesaut.php");
    } else {
        header("location:cadastropeixes.php?msg=Email ou senha inválidos");
    }
?>