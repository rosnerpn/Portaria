<?php
    require_once ("cabecalho.php");
    require_once ("logica-usuario.php");
    require_once ("banco-departamentos.php");
    
    require_once ("conecta.php");
    require_once ("banco-empresa.php");
    require_once ("banco-visitantes.php");
    $empresas = listaEmpresas($conexao);
   
    verificaUsuario();
?>
<h1>Cadastro de Visitantes</h1>
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
<form action="adiciona-visitante.php" method="post">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Nome</label>
      <input type="text" class="form-control" id="nome" required="required" placeholder="Nome" name="nome" autofocus>
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">RG </label>
      <input type="text" class="form-control"  id="rg" required="required" placeholder="RG" name="rg">
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">CPF</label>
      <input type="text" class="form-control" id="cpf" required="required" placeholder="CPF" name="cpf">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Email</label>
      <input type="email" class="form-control" id="email" required="required" placeholder="Email" name="email">
    </div>
    <div class="form-group col-md-3">
      <label for="inputCity">Telefone</label>
      <input type="text" class="form-control" id="telefone" placeholder="Telefone" name="telefone">
    </div>
    <div class="form-group col-md-3">
      <label for="inputCity">Celular</label>
      <input type="text" class="form-control" id="celular" required="required" placeholder="celular" name="celular">
    </div>
    <div class="form-group col-md-3">
      <label for="exampleFormControlSelect1">Empresa</label>
      <select class="form-control" id="empresa" name="id_empresa">
      <option name="id_empresa" value="NULL"></option>
        <?php
          foreach ($empresas as $empresa):
            $selecao = $empresa['nome'];
          
        ?>
          
          <option name="id_empresa" value="<?=$empresa['id']?>"<?=$selecao?>>
            <?=$empresa['nome'] ?>
          </option>
          <?php
            endforeach
          ?>
      </select>
    </div>
    
    </div>
      
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </form>
  <br>
  <!-- Fim do formulário -->
  <!-- DataTables Example -->
   <!-- Montagem do Datatable -->
  <div class="card mb-4">
          
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                  
                    <th>Nome</th>
                    <th>RG</th>
                    <th>CPF</th>
                    
                
                    <th>Celular</th>
                    <th>Empresa</th>
                    <th>Açôes</th>
                   </tr>
                </thead>
                <tfoot>
                  <tr>
                  
                  <th>Nome</th>
                    <th>RG</th>
                    <th>CPF</th>
                    
                  
                    <th>Celular</th>
                    <th>Empresa</th>
                    <th>Açôes</th>
                  </tr>
                </tfoot>
                <tbody>
					<?php
						$visitantes = listaVisitantes($conexao);
						foreach ($visitantes as $visitante):
					?>
                  <tr>
                   
                    <td><?= $visitante['nome'] ?></td>
                    <td><?= mask($visitante['rg'],"##.###.###-#") ?></td>
                    <td><?= mask($visitante['cpf'],'###.###.###-##') ?></td>
                    
                    
                    <td><?= mask($visitante['celular'],"(##) ##### ####") ?></td>
                    <td><?= $visitante['id_empresa'] ?></td>
                    <td><a  class="fas fa-edit btn btn-primary" href="edita-visitantes.php?id=<?=$visitante['id']?>"></a>
                   
                    <a class="fas fa-arrow-alt-circle-up btn btn-success" href="entrada.php?id=<?=$visitante['id']?>"></a>
                    
                    
                   
                                      
                  </tr>
                  <?php

                  endforeach
                  ?>
                </tbody>
              </table>
            </div>
          </div>
   <?php require_once ("rodape.php");