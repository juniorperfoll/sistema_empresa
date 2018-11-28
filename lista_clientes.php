<div class="row">
    <div class="col-md-12">
        <h3>Lista de Clientes</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="?pg=cadastrar_clientes" class="btn btn-primary"><span data-feather="plus"></span>Cadastrar</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table">
          <thead class="thead-dark">
              <tr>
                <th scope="col">Código</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php
                include_once 'conectar.php';
                $sqlSelectClientes = "SELECT * FROM clientes ORDER BY nome";
                $stmt = $conn->prepare($sqlSelectClientes);
                $stmt->execute();
                $resultsClientes = $stmt->fetchAll();
                foreach ($resultsClientes as $dadosClientes) {
                    $id = $dadosClientes["id"];
                    $nome = $dadosClientes["nome"];
                    $email = $dadosClientes["email"];
                    $cidade = $dadosClientes["cidade"];
                    $estado = $dadosClientes["estado"];
                    echo "<tr>";
                      echo "<td>$id</td>";
                      echo "<td>$nome</td>";
                      echo "<td>$email</td>";
                      echo "<td>$cidade</td>";
                      echo "<td>$estado</td>";
                      echo "<td>
                                <a href='?pg=editar_clientes&id=$id' title='Editar $nome'><span data-feather='edit'></span></a>
                                <a href='?pg=excluir_clientes&id=$id' title='Excluir $nome' onclick='return confirm(\"Deseja Excluir?\")'><span data-feather='trash'></span></a>
                                <a href='?pg=ver_clientes&id=$id' title='Ver $nome'><span data-feather='search'></span></a>
                            </td>";
                    echo "</tr>";
                }
              ?>
            </tbody>
        </table>
    </div>
</div>
