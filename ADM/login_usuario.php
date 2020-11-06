<?php

session_start();

$username = strtoupper($_POST['username']);
$senha = $_POST['senha'];

if (strlen($username) > 3 && strlen($senha) > 3) {
    $senha_cripto = md5($senha);

    $conn = mysqli_connect("localhost", "root", "", "sosmedicamentos");

    // Execução da instrução SQL
    $resultado_consulta = $conn->query("SELECT * from administrador where username = '$username' AND senha = '$senha_cripto'");

    // $usuarios = Retorno da consulta no banco de dados
    $usuarios = mysqli_fetch_assoc($resultado_consulta);

    $_SESSION['username'] = $usuarios["username"];
    $_SESSION['nome'] = $usuarios["nome"];
    $_SESSION['imagem'] = $usuarios["imagem"];
    $_SESSION['email'] = $usuarios["email"];
    $_SESSION['senha'] = $usuarios["senha"];

    header('Location: pagubs.php');
} else {
    echo "
        <script>
            alert('E-mail ou senha inválidos!')
            location.href = 'index.php'
        </script>
    ";
}
