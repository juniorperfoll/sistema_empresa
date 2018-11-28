<div class="row">
    <div class="col-md-12">
        <h3>Lista de Produtos</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="?pg=cadastrar_produtos" class="btn btn-primary"><span data-feather="plus"></span>Cadastrar</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table">
          <thead class="thead-dark">
              <tr>
                <th scope="col">Código</th>
                <th scope="col">Nome</th>
                <th scope="col">Preço Custo</th>
                <th scope="col">Preço Venda</th>
                <th scope="col">Foto</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php
                include_once 'conectar.php';
                $sqlSelectProdutos = "SELECT * FROM produtos ORDER BY nome";
                $stmt = $conn->prepare($sqlSelectProdutos);
                $stmt->execute();
                $resultsProdutos = $stmt->fetchAll();
                foreach ($resultsProdutos as $dadosProdutos) {
                    $id = $dadosProdutos["id"];
                    $nome = $dadosProdutos["nome"];
                    $precoCusto = number_format($dadosProdutos["preco_custo"],2,",",".");
                    $precoVenda = number_format($dadosProdutos["preco_venda"],2,",",".");
                    $foto = $dadosProdutos["foto"];
                    echo "<tr>";
                      echo "<td>$id</td>";
                      echo "<td>$nome</td>";
                      echo "<td>R$ $precoCusto</td>";
                      echo "<td>R$ $precoVenda</td>";
                      echo "<td><img src='fotos/$foto' class='img-thumbnail' width=72></td>";
                      echo "<td>
                                <a href='?pg=editar_produtos&id=$id' title='Editar $nome'><span data-feather='edit'></span></a>
                                <a href='?pg=excluir_produtos&id=$id' title='Excluir $nome' onclick='return confirm(\"Deseja Excluir?\")'><span data-feather='trash'></span></a>
                                <a href='?pg=ver_produtos&id=$id' title='Ver $nome'><span data-feather='search'></span></a>
                            </td>";
                    echo "</tr>";
                }
              ?>
            </tbody>
        </table>
    </div>
</div>
