<?php
  //script que faz aparecer os dados na tela
  include_once 'conectar.php';
  $id = $_GET["id"];
  $sqlConsultaCliente = "SELECT * FROM clientes WHERE id =:id";
  $stmt = $conn->prepare($sqlConsultaCliente);
  $stmt->execute([':id'=>$id]);
  $dadosForm = $stmt->fetch();
?>
<div class="row">
  <div class="col-md-12">
      <h3>Visualizar Cliente</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <form method="post">
        <div class="form-group">
          <label for="nome">Nome</label>
          <input disabled type="text" id="nome" name="nome" class="form-control" value="<?= $dadosForm['nome']?>" placeholder="Nome" required>
        </div>
        <div class="form-group">
          <label for="cpf">CPF</label>
          <input disabled type="text" id="cpf" name="cpf" class="form-control" value="<?= $dadosForm['cpf']?>"  placeholder="999.999.999-99" required>
        </div>
        <div class="form-group">
          <label for="data_nascimento">Data de Nascimento</label>
          <input disabled type="text" id="data_nascimento" name="data_nascimento" class="form-control" value="<?= $dadosForm['data_nascimento']?>"  placeholder="99/99/9999" required>
        </div>
        <div class="form-group">
          <label for="endereco">Endereço</label>
          <input disabled type="text" id="endereco" name="endereco" class="form-control" value="<?= $dadosForm['endereco']?>"  placeholder="Endereço" required>
        </div>
        <div class="form-group">
          <label for="bairro">Bairro</label>
          <input disabled type="text" id="bairro" name="bairro" class="form-control" value="<?= $dadosForm['bairro']?>"  placeholder="Bairro" required>
        </div>
        <div class="form-group">
          <label for="complemento">Complemento</label>
          <input disabled type="text" id="complemento" name="complemento" class="form-control" value="<?= $dadosForm['complemento']?>"  placeholder="Complemento">
        </div>
        <div class="form-group">
          <label for="cidade">Cidade</label>
          <input disabled type="text" id="cidade" name="cidade" class="form-control" value="<?= $dadosForm['cidade']?>"  placeholder="Cidade" required>
        </div>
        <div class="form-group">
          <label for="estado">Estado</label>
          <select disabled id="estado" name="estado" class="form-control"  required>
              <option value="">Selecione o Estado</option>
              <option value="PR" <?= ($dadosForm['estado']=="PR")?"selected":"" ?>>Paraná</option>
              <option value="RS" <?= ($dadosForm['estado']=="RS")?"selected":"" ?>>Rio Grande do Sul</option>
              <option value="SC" <?= ($dadosForm['estado']=="SC")?"selected":"" ?>>Santa Catarina</option>
          </select>
        </div>
        <div class="form-group">
          <label for="email">E-mail</label>
          <input disabled type="email" id="email" name="email" class="form-control" value="<?= $dadosForm['email']?>"  placeholder="E-mail">
        </div>
        <div class="form-group">
          <label for="telefone">Telefone</label>
          <input disabled type="text" id="telefone" name="telefone" class="form-control" value="<?= $dadosForm['telefone']?>"  placeholder="(99) 9999-9999" required>
        </div>
        <a href="?pg=lista_clientes" class="btn btn-danger"><span data-feather="x-circle"></span> Cancelar</a>
    </form>
  </div>
</div>
