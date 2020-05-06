<?php
    require_once ("cabecalho.php");
    require_once ("conecta.php");
    require_once ("banco-departamentos.php");
    require_once ("logica-usuario.php");

    verificaUsuario();
   

?>
<h1>Cadastro de Departamentos</h1>
<!-- Início das mensagens de alertas vindas da logica de usuário -->
<?php if(isset($_SESSION["danger"])) { ?>
      <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong><?= $_SESSION["danger"] ?></strong> 
      </div>
      <?php  unset($_SESSION["danger"]);} ?>
       

       <?php if(isset($_SESSION["success"])) { ?>
        <div class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong><?= $_SESSION["success"] ?></strong> 
       </div>

       <?php  unset($_SESSION["success"]);} ?>
<!-- Fim das mensagens -->
<hr>
<!-- Formulário de cadastro -->
<form action="adiciona-departamento.php" method="post">
  <div class="form-row">
  <div class="form-group col-md-3">
      <label>Nome do Departamento</label>
      <input type="text" class="form-control" id="nomedepto" required="required" placeholder="Nome do Departamento" name="nomedepto" autofocus>
    </div>
    </div>
      
    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
<br>
   <!-- Montagem do Datatable -->
   <div class="card mb-4">
          
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Departamento</th>
                    <th>Data do Cadastro</th>
                    <th>Ações</th>
                   </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Departamento</th>
                    <th>Data do Cadastro</th>
                    <th>Ações</th>
                    
                  </tr>
                </tfoot>
                <tbody>
					<?php
						$departamentos = listaDepto($conexao);
						foreach ($departamentos as $departamento):
					?>
                  <tr>
                    <td><?= $departamento['id'] ?></td>
                    <td><?= $departamento['nome'] ?></td>
                    <!--conversão da data-->
                    <td><?= date ('d/m/Y H:i:s', strtotime($departamento['datacad'])); ?></td> 
                    <td><a class="fas fa-edit btn btn-primary" href="edita-depto.php?id=<?=$departamento['id']?>"></a>
                    
                    </td>
                  </tr>
                  <?php

                  endforeach
                  ?>
                </tbody>
              </table>
            </div>
          </div>
<?php require_once ("rodape.php");