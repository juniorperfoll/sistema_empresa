<?php
  $servidor = "127.0.0.1";
  $username = "root";
  $password = "";
  try {
    $conn = new PDO("mysql:host=$servidor;dbname=empresa",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo "Conectou com sucesso!";
  } catch(PDOException $erro) {
      echo "Falha de conexão: ".$erro->getMessage();
  }
?>
