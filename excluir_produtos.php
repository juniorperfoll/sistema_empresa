<?php
  include_once 'conectar.php';
  $id = $_GET["id"];
  //pegar o nome da foto que precisa ser excluida
  $sqlConsultaProduto = "SELECT * FROM produtos WHERE id =:id";
  $stmt = $conn->prepare($sqlConsultaProduto);
  $stmt->execute([':id'=>$id]);
  $dadosProduto = $stmt->fetch();
  //dar permissao para excluir a foto da pasta
  @chown("fotos/".$dadosProduto["foto"]);
  //excluir arquivo da pasta
  if(unlink("fotos/".$dadosProduto["foto"])) {
    $sqlExcluirProduto = "DELETE FROM produtos WHERE id =:id";
    $stmt = $conn->prepare($sqlExcluirProduto);
    $stmt->execute([':id'=>$id]);
    echo "<script type='text/javascript'>";
       echo "alert('Excluído com Sucesso!');";
       echo "location.href='?pg=lista_produtos';";
    echo "</script>";
  }
