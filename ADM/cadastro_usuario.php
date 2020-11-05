<?php

$nome = strtoupper($_POST['nome']);
$username = strtoupper($_POST['username']);
$imagem = $_POST['imagem'];
$email = strtoupper($_POST['email']);
$senha = $_POST['senha'];
$conf_senha = $_POST['conf_senha'];


if (strlen($nome) > 3 && strlen($email) > 3 && strlen($senha) > 3 && $senha == $conf_senha) {
    $senha_cripto = md5($senha);

    $conn = mysqli_connect("localhost", "root", "", "sosmedicamentos");

    $sql = "INSERT INTO administrador (username, nome, imagem, email, senha) values ('$username','$nome', '$imagem', '$email', '$senha_cripto')";
    $conn->query($sql);

    echo "<script>
            alert('Cadastro efetuado!')
            window.location.href = 'cadastro.php'
        </script>
        ";
} else if ($senha != $conf_senha) {
    echo "<script>
            alert('As senhas devem ser iguais, tente novamente!')
            window.location.href = 'cadastro.php'
        </script>
        ";
} else if (strlen($nome) <= 3) {
    echo "<script>
        alert('Digite um nome válido para realizar o cadastro!')
        window.location.href = 'cadastro.php'
    </script>
    ";
} else if (strlen($email) <= 3) {
    echo "<script>
        alert('Digite um e-mail válido para realziar o cadastro!')
        window.location.href = 'cadastro.php'
    </script>
    ";
} else if (strlen($senha) <= 3) {
    echo "<script>
        alert('Digite uma senha válida para realizar o cadastro!')
        window.location.href = 'cadastro.php'
    </script>
    ";
}
