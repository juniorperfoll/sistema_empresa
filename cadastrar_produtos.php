<div class="row">
  <div class="col-md-12">
      <h3>Cadastrar Produto</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" required>
        </div>
        <div class="form-group">
          <label for="preco_custo">Preço de Custo</label>
          <input type="text" id="preco_custo" name="preco_custo" class="form-control" placeholder="99,99" required>
        </div>
        <div class="form-group">
          <label for="preco_venda">Preço de Venda</label>
          <input type="text" maxlength="10" id="preco_venda" name="preco_venda" class="form-control" placeholder="99,99" required>
        </div>
        <div class="form-group">
          <label for="lucro">% de Lucro</label>
          <input type="number" id="lucro" name="lucro" class="form-control" placeholder="Lucro" required>
        </div>
        <div class="form-group">
          <label for="marca">Marca</label>
          <input type="text" id="marca" name="marca" class="form-control" placeholder="Marca" required>
        </div>
        <div class="form-group">
          <label for="modelo">Modelo</label>
          <input type="text" id="modelo" name="modelo" class="form-control" placeholder="Modelo" required>
        </div>
        <div class="form-group">
          <label for="categoria">Categoria</label>
          <input type="categoria" id="categoria" name="categoria" class="form-control" placeholder="Categoria">
        </div>
        <div class="form-group">
          <label for="foto">Foto</label>
          <input type="file" id="foto" name="foto" class="form-control" placeholder="Foto do Produto">
        </div>
        <button type="submit" class="btn btn-success" name="confirmar" value="confirmar"><span data-feather="save"></span> Confirmar</button>
        <a href="?pg=lista_produtos" class="btn btn-danger"><span data-feather="x-circle"></span> Cancelar</a>
    </form>
  </div>
</div>
<?php
    @$confirmar = $_POST["confirmar"];
    if(isset($confirmar)) {
       include_once 'conectar.php';
       include_once 'funcoes.php';
       $nome = $_POST["nome"];
       $preco_custo = $_POST["preco_custo"];
       $preco_venda = $_POST["preco_venda"];
       $lucro = $_POST["lucro"];
       $marca = $_POST["marca"];
       $modelo = $_POST["modelo"];
       $categoria = $_POST["categoria"];
       $foto = $_FILES["foto"];
       //pegando a extensao do arquivo
       $ext = strtolower(substr($_FILES["foto"]["name"],-4));
       //definindo um novo nome para o arquivo que ficará salvo
       $novo_nome = date("Y.m.d-H.i.s").$ext;
       //diretorio onde será salvo a Foto
       $dir = "fotos/";
       //funcao do PHP que salva a foto
       move_uploaded_file($_FILES["foto"]["tmp_name"],$dir.$novo_nome);
       $sqlInserirProduto = "INSERT INTO produtos (nome,preco_custo,preco_venda,lucro,marca,modelo,categoria,foto)
                                  VALUES (:nome,:preco_custo,:preco_venda,:lucro,:marca,:modelo,:categoria,:foto)";
       $stmt = $conn->prepare($sqlInserirProduto);
       $stmt->execute([':nome'=>$nome,':preco_custo'=>$preco_custo,
                       ':preco_venda'=>$preco_venda,':lucro'=>$lucro,
                       ':marca'=>$marca,':modelo'=>$modelo,
                       ':categoria'=>$categoria,':foto'=>$novo_nome]);
       echo "<script type='text/javascript'>";
          echo "alert('Cadastrado com Sucesso!');";
          echo "location.href='?pg=lista_produtos';";
       echo "</script>";
    }
?>
