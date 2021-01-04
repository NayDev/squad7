<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script type="text/javascript">

  $(document).ready(function(){

    //change
//  $("#sclStatus").change(function(){
//      var table = $("#tbPedidos");
//      var status = $("#sclStatus").val(); 
//      var grid = $("#sclStatusGrid").val();
//      if(status != "selecione")
//      {
//          table.find('tbody tr > td > select').filter(function(){
//      $(status).toggle($(grid).indexOf(grid) > -1)
//          });
//      }
//  });

});
function meuPedido() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("tbPedidos");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myFunction() {
  var input, filter, table, tbody, tr, td, i;
  input = document.getElementById("sclStatus").value;
  filter = input;
  table = document.getElementById("tbPedidos");
  tbody = table.getElementsByTagName("tbody")[0];
  tr = tbody.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[7];
    if (td) {
      if (td.getElementsByTagName("select")[0].value == filter || filter == "") {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }     
}

  </script>

</head>
<body>
<div class="Container">
<br/>
<label>Status</label>
<select id="sclStatus" onchange="myFunction()">
<option value="">Selecione</option>
<option value="L">Liberado</option>
<option value="A">Pendente</option>
<option value="E">Excluído</option>
<option value="P">Aguardando Faturamento</option>
</select>
<br>
<label>Pedido</label>
<input type="text" id="myInput" onkeyup="meuPedido()" placeholder="Pedido.." title="Type in a name">
<br>
<hr>
<br>
<div class="table-reponsive">
<table id="tbPedidos" class="table">
<thead>
<tr>
<th>Empresa</th>
<th>Pedido</th>
<th>ID</th>
<th>Nome</th>
<th>Data</th>
<th>Data Liberação</th>
<th>Pontos</th>
<th>Status</th>
</tr>
</thead>
<tbody>

<tr>
    <td>01</td>
    <td>000001</td>
    <td>4450</td>
    <td>Igor Carreiro</td>
    <td>15/07/2018</td>
    <td>-</td>
    <td>0</td>
    <td><select id="sclStatusGrid">
        <option value="L">Liberado</option>
        <option value="A">Pendente</option>
        <option value="E">Excluído</option>
        <option value="P">Aguardando Faturamento</option>
        </select></td>
</tr>
<tr>
    <td>01</td>
    <td>000002</td>
    <td>4450</td>
    <td>Igor Carreiro</td>
    <td>16/07/2018</td>
    <td>-</td>
    <td>0</td>
    <td><select id="sclStatusGrid">
    <option value="A">Pendente</option>
        <option value="L">Liberado</option>
        <option value="E">Excluído</option>
        <option value="P">Aguardando Faturamento</option>
        </select></td>
</tr>
<tr>
    <td>01</td>
    <td>000003</td>
    <td>4450</td>
    <td>Igor Carreiro</td>
    <td>17/07/2018</td>
    <td>-</td>
    <td>0</td>
    <td><select id="sclStatusGrid">
    <option value="E">Excluído</option>
        <option value="L">Liberado</option>
        <option value="A">Pendente</option>
        <option value="P">Aguardando Faturamento</option>
        </select></td>
</tr>
</tbody>
</table>
</div>
</div>
</body>
</html>