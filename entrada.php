<?php
    require_once ("cabecalho.php");
    require_once ("logica-usuario.php");
    require_once ("banco-funcionarios.php");
    require_once ("banco-entrada.php");
    require_once ("conecta.php");
    require_once ("banco-empresa.php");
    

    $funcionarios = listaFuncionarios($conexao);
   
    verificaUsuario();
    $id= $_GET['id'];
    $visitante = buscaVisitante2($conexao,$id);
?>
<h1>Entrada de Visitantes</h1>
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
<form action="adiciona-entrada.php" method="post">
  <div class="form-row">
  <div class="form-group col-md-3">
    <input type="hidden" name="id" value="<?=$id?>">
      <label for="inputPassword4">Nome</label>
      <input type="text" class="form-control"  id="nome" value="<?=$visitante['nome']?>"  readonly ="true" name="nome">
    </div>
    <div class="form-group col-md-2">
      <label for="inputEmail4">RG</label>
      <input type="text" class="form-control" id="rg" readonly ="true" value="<?=$visitante['rg']?>" name="rg">
    </div>
        <div class="form-group col-md-3">
      <label for="inputPassword4">Empresa</label>
      <input type="text" class="form-control" id="empresa" value="<?=$visitante['empresa']?>"  readonly ="true" name="empresa">
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">Telefone</label>
      <input type="email" class="form-control" id="telefone" value="<?=$visitante['telefone']?>"  readonly ="true" name="telefone">
    </div>
    <div class="form-group col-md-2">
      <label for="inputCity">Celular</label>
      <input type="text" class="form-control" id="celular" value="<?=$visitante['celular']?>"  readonly ="true" name="celular">
    </div>
    
    <div class="form-group col-md-2">
      <label for="inputCity">Placa</label>
      <input type="text" class="form-control" id="placa" placeholder ="Placa" name="placa">
    </div>
    <div class="form-group col-md-2">
      <label for="inputCity">Veículo</label>
      <input type="text" class="form-control" id="veiculo" placeholder ="Veículo" name="veiculo">
    </div>

    <div class="form-group col-md-3">
      <label for="exampleFormControlSelect1">Contato</label>
      <select class="form-control" id="empresa" name="id_funcionario" required>
      <option></option>
        <?php
          foreach ($funcionarios as $funcionario):
            $selecao = $funcionario['nome'];
          
        ?>
          
          <option name="id_empresa" value="<?=$funcionario['id']?>"<?=$selecao?> >
            <?=$funcionario['nome'] ?>
          </option>
          <?php
            endforeach
          ?>
      </select>
    </div>
    
    </div>
      
    <button type="submit" class="btn btn-success">Liberar Entrada</button>
    <button type="button" class="btn btn-warning" onClick="history.go(-1)">Cancelar</button>
  </form>
  <br>
  <!-- Fim do formulário -->
  
   <?php require_once ("rodape.php");