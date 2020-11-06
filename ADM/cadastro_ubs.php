<?php

$cadastrado_por_id = strtoupper($_POST['cadastrado_por_id']);
$nome = strtoupper($_POST['nome']);
$descricao = $_POST['descricao'];
$endereco = strtoupper($_POST['endereco']);
$bairro = strtoupper($_POST['bairro']);
$distrito = strtoupper($_POST['distrito']);
$zona = strtoupper($_POST['zona']);
$cidade = strtoupper($_POST['cidade']);
$uf = strtoupper($_POST['uf']);
$cep = strtoupper($_POST['cep']);
$telefone = strtoupper($_POST['telefone']);
$latitude = strtoupper($_POST['latitude']);
$longitude = strtoupper($_POST['longitude']);



if (strlen($nome) > 3 && strlen($endereco) > 3 && strlen($distrito) > 3) {
  $conn = mysqli_connect("localhost", "root", "", "sosmedicamentos");

  $sql = "INSERT INTO ubs (cadastrado_por_id, nomeUbs, descricao, endereco, bairro, distrito, zona, cidade, uf, cep, telefone, latitude, longitude) VALUES ('$cadastrado_por_id', '$nome', '$descricao', '$endereco', '$bairro', '$distrito', '$zona', '$cidade', '$uf', '$cep', '$telefone', '$latitude', '$longitude');";

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
