<?php

$cadastrado_por_id = strtoupper($_POST['cadastrado_por_id']);
$id = strtoupper($_POST['id']);
$nome = strtoupper($_POST['nome']);
$observacao = $_POST['observacao'];


if (strlen($cadastrado_por_id) > 3 && strlen($nome) > 3) {
  $conn = mysqli_connect("localhost", "root", "", "sosmedicamentos");

  $sql = "INSERT INTO medicamento (cadastrado_por_id, id, nome, observacao) VALUES ('$cadastrado_por_id', '$id', '$nome', '$observacao');";

  $conn->query($sql);

  echo "<script>
  alert('Cadastro efetuado!')
  window.location.href = 'pagmed.php'
  </script>
  ";
} else {
  echo "<script>
  alert('Dados invalidos!')
  window.location.href = 'pagmed.php'
  </script>
  ";
}
