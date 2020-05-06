<?php
    require_once ("cabecalho.php");
    require_once ("logica-usuario.php");
    require_once ("banco-departamentos.php");
    require_once ("banco-funcionarios.php");
    require_once ("conecta.php");
    $departamentos = listaDepto($conexao);
   
    verificaUsuario();
?>
<h1>Cadastro de Funcionários</h1>
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
<form action="adiciona-funcionarios.php" method="post">
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
      <label for="inputCity">Ramal</label>
      <input type="text" class="form-control" id="ramal" required="required" placeholder="Ramal" name="ramal">
    </div>
    <div class="form-group col-md-3">
      <label for="inputCity">Matricula</label>
      <input type="text" class="form-control" id="matricula" required="required" placeholder="Matricula" name="matricula">
    </div>
    <div class="form-group col-md-3">
      <label for="exampleFormControlSelect1">Departamento</label>
      <select class="form-control" id="departamento" name="id_depto">
      <option>Selecione</option>
        <?php
          foreach ($departamentos as $departamento):
            $selecao = $departamento['nome'];
          
        ?>
          
          <option name="id_depto" value="<?=$departamento['id']?>"<?=$selecao?>>
            <?=$departamento['nome'] ?>
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
                    <th>Matricula</th>
                    <th>E-mail</th>
                    <th>Departamento</th>
                    <th>RG</th>
                    <th>CPF</th>
                    <th>Ramal</th>
                    <th>Açôes</th>
                   </tr>
                </thead>
                <tfoot>
                  <tr>
                  
                    <th>Nome</th>
                    <th>Matricula</th>
                    <th>E-mail</th>
                    <th>Departamento</th>
                    <th>RG</th>
                    <th>CPF</th>
                    <th>Ramal</th>
                    <th>Ações</th>
                  </tr>
                </tfoot>
                <tbody>
					<?php
						$funcionarios = listaFuncionarios($conexao);
						foreach ($funcionarios as $funcionario):
					?>
                  <tr>
                   
                    <td><?= $funcionario['nome'] ?></td>
                    <td><?= $funcionario['matricula'] ?></td>
                    <td><?= $funcionario['email'] ?></td>
                    <td><?= $funcionario['id_departamento'] ?></td>
                    <td><?= mask($funcionario['rg'],"##.###.###-#") ?></td>
                    <td><?= mask($funcionario['cpf'],'###.###.###-##') ?></td>
                    <td><?= $funcionario['ramal'] ?></td>
                    <td><a class="fas fa-edit btn btn-primary" href="edita-funcionario.php?id=<?=$funcionario['id']?>"></a>
                    
                   
                                      
                  </tr>
                  <?php

                  endforeach
                  ?>
                </tbody>
              </table>
            </div>
          </div>
   <?php require_once ("rodape.php");