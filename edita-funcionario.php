<?php
    require_once ("cabecalho.php");
    require_once ("logica-usuario.php");
    require_once ("banco-departamentos.php");
    require_once ("banco-funcionarios.php");
    require_once ("conecta.php");

    $departamentos = listaDepto($conexao);
   
    verificaUsuario();
    $id= $_GET['id'];
    $funcionario = buscaFuncionario($conexao,$id);
     
?>
<h1>Alterando Funcionários</h1>
<hr>
<!-- Formulário de cadastro -->
<form action="altera-funcionario.php" method="post">
<input type="hidden" name="id" value="<?=$id?>">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Nome</label>
      <input type="text" class="form-control" id="nome" value="<?=$funcionario['nome']?>" name="nome">
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">RG </label>
      <input type="text" class="form-control"  id="rg" value="<?=$funcionario['rg']?>" name="rg">
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">CPF</label>
      <input type="text" class="form-control" id="cpf" value="<?=$funcionario['cpf']?>"  name="cpf">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Email</label>
      <input type="email" class="form-control" id="email" value="<?=$funcionario['email']?>"  name="email">
    </div>
    <div class="form-group col-md-3">
      <label for="inputCity">Ramal</label>
      <input type="text" class="form-control" id="ramal" value="<?=$funcionario['ramal']?>"  name="ramal">
    </div>
    <div class="form-group col-md-3">
      <label for="inputCity">Matricula</label>
      <input type="text" class="form-control" id="matricula" value="<?=$funcionario['matricula']?>"  name="matricula">
    </div>
    <div class="form-group col-md-3">
      <label for="exampleFormControlSelect1">Departamento</label>
      <select class="form-control" id="departamento" name="id_depto">
      <option></option>
        <?php
            foreach ($departamentos as $departamento):
            $deptoSelecionado = $funcionario['id_departamento'] == $departamento['id'];
            $selecao = $deptoSelecionado ? "selected='selected'" : "";
        ?>
          
          <option value="<?=$departamento['id']?>" <?=$selecao?>>
            <?=$departamento['nome'] ?>
          </option>
          <?php
            endforeach
          ?>
      </select>
    </div>
    
    </div>
      
    <button type="submit" class="btn btn-primary">Alterar</button>
    <button type="button" class="btn btn-warning" onClick="history.go(-1)">Cancelar</button>
    
  </form>
  <br>
  <!-- Fim do formulário -->

  <?php require_once ("rodape.php");