<?php
    require_once ("cabecalho.php");
    require_once ("logica-usuario.php");
    require_once ("banco-departamentos.php");
    require_once ("banco-empresa.php");
    require_once ("conecta.php");
    require_once ("banco-funcionarios.php");
  
    $estados =listaEstados($conexao);
    verificaUsuario();
?>
<h1>Cadastro de Empresas</h1>
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
<form action="adiciona-empresa.php" method="post">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Nome</label>
      <input type="text" class="form-control" id="nome" required="required" placeholder="Nome" name="nome" autofocus>
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">CNPJ</label>
      <input type="text" class="form-control"  id="cnpj" required="required" placeholder="CNPJ" name="cnpj">
    </div>

    <div class="form-group col-md-2">
      <label for="inputPassword4">Inscrição Estadual</label>
      <input type="text" class="form-control"  id="ie" placeholder="Inscrição Estadual" name="ie">
    </div>
    <div class="form-group col-md-2">
      <label for="inputCity">CEP</label>
      <input type="text" class="form-control" id="cep"  placeholder="CEP" name="cep">
    </div>

    <div class="form-group col-md-3">
      <label for="inputPassword4">Endereço</label>
      <input type="text" class="form-control" id="rua" required="required" placeholder="Endereço" name="endereco" readonly ="true">
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">Número</label>
      <input type="text" class="form-control" id="numero" required="required" placeholder="Número" name="numero">
    </div>
    <div class="form-group col-md-2">
      <label for="inputCity">Bairro</label>
      <input type="text" class="form-control" id="bairro" required="required" placeholder="Bairro" name="bairro" readonly ="true">
    </div>
    <div class="form-group col-md-2">
      <label for="inputCity">Cidade</label>
      <input type="text" class="form-control" id="cidade" required="required" placeholder="Cidade" name="cidade" readonly ="true">
    </div>

    <div class="form-group col-md-2">
      <label for="inputCity">Estado</label>
      <input type="text" class="form-control" id="uf" placeholder="UF" name="estado" readonly ="true">
    </div>
    
        <div class="form-group col-md-4">
      <label for="inputCity">Complemento</label>
      <input type="text" class="form-control" id="complemento"  placeholder="Complemento" name="complemento">
    </div>
    <div class="form-group col-md-2">
      <label for="inputCity">Telefone</label>
      <input type="text" class="form-control" id="telefone" required="required" placeholder="Telefone" name="telefone">
    </div>
    <div class="form-group col-md-2">
      <label for="inputCity">Celular</label>
      <input type="text" class="form-control" id="celular"  placeholder="Celular" name="celular">
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
                    <th>CNPJ</th>
                    <th>Endereço</th>
                  
                  
                    <th>Cidade</th>
                    <th>Telefone</th>
                    <th>Açôes</th>
                   </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>Endereço</th>
                   
                   
                    <th>Cidade</th>
                    <th>Telefone</th>
                    <th>Açôes</th>
                  </tr>
                </tfoot>
                <tbody>
					<?php
						$empresas = listaEmpresas($conexao);
						foreach ($empresas as $empresa):
					?>
                  <tr>
                    <td><?= $empresa['nome']?></td>
                    <td><?= mask($empresa['cnpj'],"##.###.###/####-##")?></td>
                    <td><?= $empresa['endereco']?></td>
                    
                    
                    <td><?= $empresa['cidade']?></td>
                    <td><?= mask($empresa['telefone'],"(##) ####-####")?></td>
                    <td><a class="fas fa-edit btn btn-primary" href="edita-empresa.php?id=<?=$empresa['id']?>"></a>
                     
                   
                                      
                  </tr>
                  <?php

                  endforeach
                  ?>
                </tbody>
              </table>
            </div>
          </div>
   <?php require_once ("rodape.php");