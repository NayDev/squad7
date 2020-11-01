<?php

session_start();

$username = $_POST['username'];
$senha = $_POST['senha'];

if (strlen($username) > 3 && strlen($senha) > 3) {
    $senha_cripto = $senha;

    $conn = mysqli_connect("localhost", "root", "", "sosmedicamentos");

    // Execução da instrução SQL
    $resultado_consulta = $conn->query("SELECT * from administrador where username = '$username' AND senha = '$senha_cripto'");

    // $usuarios = Retorno da consulta no banco de dados
    $usuarios = mysqli_fetch_all($resultado_consulta);

    $_SESSION['username'] = $usuarios[0][0];
    $_SESSION['nome'] = $usuarios[0][3];
    $_SESSION['imagem'] = $usuarios[0][4];
    $_SESSION['email'] = $usuarios[0][1];
    $_SESSION['senha'] = $usuarios[0][2];

    header('Location: pagubs.php');
} else if (strlen($username) > 3 xor strlen($senha) > 3) {
    echo "
    <script>
        alert('Favor preencher ambos campos!')
        location.href = 'login.php'
    </script>
";
} else {
    echo "
        <script>
            alert('E-mail ou senha inválidos!')
            location.href = 'login.php'
        </script>
    ";
}
