<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistema Portaria</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
       <div class="card-header">Login</div>
       
      <div class="card-body">
    <!--Mensagem erro usuário/senha e deslogado-->
    <?php if(isset($_SESSION["success"])) { ?>
            <p class="text-success"><?= $_SESSION["success"] ?> </p>
       <?php  unset($_SESSION["success"]);} ?>
      
       <?php if(isset($_SESSION["danger"])) { ?>
            <p class="text-danger"><?= $_SESSION["danger"] ?> </p>
       <?php  unset($_SESSION["danger"]);} ?>

         <form action="login.php" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" placeholder="E-mail" required="required" autofocus="autofocus" name="email">
              <label for="inputEmail">E-mail</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required="required" name="senha">
              <label for="inputPassword">Senha</label>
            </div>
          </div>
            <button class="btn btn-primary btn-block">Login</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
