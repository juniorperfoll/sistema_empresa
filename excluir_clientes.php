<?php
  include_once 'conectar.php';
  $id = $_GET["id"];
  $sqlExcluirCliente = "DELETE FROM clientes WHERE id =:id";
  $stmt = $conn->prepare($sqlExcluirCliente);
  $stmt->execute([':id'=>$id]);
  echo "<script type='text/javascript'>";
     echo "alert('Excluído com Sucesso!');";
     echo "location.href='?pg=lista_clientes';";
  echo "</script>";
