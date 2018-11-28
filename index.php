<!DOCTYPE html>
<html>
  <head>
      <title>Sistema da Empresa</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="css/bootstrap.css">
      <script type="text/javascript" src="js/bootstrap.js"></script>
      <link rel="stylesheet" href="css/login.css">
  </head>
  <body class="text-center">
    <form method="post" class="form-signin">
        <img class="mb-4" src="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Faça o login</h1>
        <?php
          @$entrar = $_POST["entrar"];
          if(isset($entrar)&&!empty($entrar)) {
             $email = $_POST["email"];
             $senha = $_POST["senha"];
             include_once 'conectar.php';
             $sqlValida = "SELECT * FROM funcionarios
                            WHERE email =:email AND senha =:senha";
             $stmt = $conn->prepare($sqlValida);
             $stmt->execute(["email"=>$email,"senha"=>$senha]);
             $funcionario = $stmt->fetch(PDO::FETCH_BOTH);
             if($stmt->rowCount()>0) {
               header("Location:menu.php");
             } else {
               echo "<div class='alert alert-danger'>
                      E-mail ou Senha inválidos!
                    </div>";
             }
          }
        ?>
        <label for="email" class="sr-only">E-mail</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" required>
        <label for="senha" class="sr-only">Senha</label>
        <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>
        <button class="btn btn-lg btn-primary btn-block" name="entrar" value="entrar" type="submit">Entrar</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
    </form>
  </body>
</html>
