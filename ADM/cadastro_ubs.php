<?php

$cadastrado_por_id = $_POST['cadastrado_por_id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$endereco = $_POST['endereco'];
$distrito = $_POST['distrito'];
$zona = $_POST['zona'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$cep = $_POST['cep'];
$telefone = $_POST['telefone'];


if (strlen($nome) > 3 && strlen($endereco) > 3 && strlen($distrito) > 3) {
  $conn = mysqli_connect("localhost", "root", "", "sosmedicamentos");

  $sql = "INSERT INTO ubs (cadastrado_por_id, nome, descricao, endereco, distrito, zona, cidade, uf, cep, telefone) VALUES ('$cadastrado_por_id', '$nome', '$descricao', '$endereco', '$distrito', '$zona', '$cidade', '$uf', '$cep', '$telefone');";
  $conn->query($sql);

  echo "<script>
  alert('Cadastro efetuado!')
  window.location.href = 'pagubs.php'
  </script>
  ";
} else {
  echo "<script>
alert('Dados invalidos!')
window.location.href = 'pagubs.php'
</script>
";
}
