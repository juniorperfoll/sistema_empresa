<div class="row">
  <div class="col-md-12">
      <h3>Cadastrar Cliente</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <form method="post">
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" required>
        </div>
        <div class="form-group">
          <label for="cpf">CPF</label>
          <input type="text" id="cpf" name="cpf" class="form-control" placeholder="999.999.999-99" required>
        </div>
        <div class="form-group">
          <label for="data_nascimento">Data de Nascimento</label>
          <input type="text" id="data_nascimento" name="data_nascimento" class="form-control" placeholder="99/99/9999" required>
        </div>
        <div class="form-group">
          <label for="endereco">Endereço</label>
          <input type="text" id="endereco" name="endereco" class="form-control" placeholder="Endereço" required>
        </div>
        <div class="form-group">
          <label for="bairro">Bairro</label>
          <input type="text" id="bairro" name="bairro" class="form-control" placeholder="Bairro" required>
        </div>
        <div class="form-group">
          <label for="complemento">Complemento</label>
          <input type="text" id="complemento" name="complemento" class="form-control" placeholder="Complemento">
        </div>
        <div class="form-group">
          <label for="cidade">Cidade</label>
          <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Cidade" required>
        </div>
        <div class="form-group">
          <label for="estado">Estado</label>
          <select id="estado" name="estado" class="form-control"  required>
              <option value="">Selecione o Estado</option>
              <option value="PR">Paraná</option>
              <option value="RS">Rio Grande do Sul</option>
              <option value="SC">Santa Catarina</option>
          </select>
        </div>
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="email" id="email" name="email" class="form-control" placeholder="E-mail">
        </div>
        <div class="form-group">
          <label for="telefone">Telefone</label>
          <input type="text" id="telefone" name="telefone" class="form-control" placeholder="(99) 9999-9999" required>
        </div>
        <button type="submit" class="btn btn-success" name="confirmar" value="confirmar"><span data-feather="save"></span> Confirmar</button>
        <a href="?pg=lista_clientes" class="btn btn-danger"><span data-feather="x-circle"></span> Cancelar</a>
    </form>
  </div>
</div>
<?php
    @$confirmar = $_POST["confirmar"];
    if(isset($confirmar)) {
       include_once 'conectar.php';
       $nome = $_POST["nome"];
       $cpf = $_POST["cpf"];
       $dataNascimento = $_POST["data_nascimento"];
       $endereco = $_POST["endereco"];
       $bairro = $_POST["bairro"];
       $complemento = $_POST["complemento"];
       $cidade = $_POST["cidade"];
       $estado = $_POST["estado"];
       $email = $_POST["email"];
       $telefone = $_POST["telefone"];
       $sqlInserirCliente = "INSERT INTO clientes (nome,cpf,data_nascimento,endereco,bairro,complemento,cidade,estado,email,telefone)
                                  VALUES (:nome,:cpf,:data_nascimento,:endereco,:bairro,:complemento,:cidade,:estado,:email,:telefone)";
       $stmt = $conn->prepare($sqlInserirCliente);
       $stmt->execute([':nome'=>$nome,':cpf'=>$cpf,
                       ':data_nascimento'=>$dataNascimento,':endereco'=>$endereco,
                       ':bairro'=>$bairro,':complemento'=>$complemento,
                       ':cidade'=>$cidade,':estado'=>$estado,
                       ':email'=>$email,':telefone'=>$telefone]);
       echo "<script type='text/javascript'>";
          echo "alert('Cadastrado com Sucesso!');";
          echo "location.href='?pg=lista_clientes';";
       echo "</script>";
    }
?>
