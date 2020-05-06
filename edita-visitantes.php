<?php
    require_once ("cabecalho.php");
    require_once ("logica-usuario.php");
    require_once ("banco-departamentos.php");
    
    require_once ("conecta.php");
    require_once ("banco-empresa.php");
    require_once ("banco-visitantes.php");
    $empresas = listaEmpresas($conexao);
   
    verificaUsuario();
    $id= $_GET['id'];
    $visitante = buscaVisitante($conexao,$id);
?>
<h1>Editando de Visitantes</h1>

<hr>
<!-- Formulário de cadastro -->
<form action="altera-visitante.php" method="post">
<input type="hidden" name="id" value="<?=$id?>">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Nome</label>
      <input type="text" class="form-control" id="nome" required="required" value="<?=$visitante['nome']?>"placeholder="Nome" name="nome">
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">RG </label>
      <input type="text" class="form-control"  id="rg" required="required" value="<?=$visitante['rg']?>" placeholder="RG" name="rg">
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">CPF</label>
      <input type="text" class="form-control" id="cpf" required="required" value="<?=$visitante['cpf']?>" placeholder="CPF" name="cpf">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Email</label>
      <input type="email" class="form-control" id="email" required="required"  value="<?=$visitante['email']?>" name="email">
    </div>
    <div class="form-group col-md-3">
      <label for="inputCity">Telefone</label>
      <input type="text" class="form-control" id="telefone" required="required" value="<?=$visitante['telefone']?>" name="telefone">
    </div>
    <div class="form-group col-md-3">
      <label for="inputCity">Celular</label>
      <input type="text" class="form-control" id="celular" required="required" value="<?=$visitante['celular']?>" name="celular">
    </div>
    <div class="form-group col-md-3">
      <label for="exampleFormControlSelect1">Empresa</label>
      <select class="form-control" id="empresa" name="id_empresa">
      <option>Selecione</option>
        <?php
          foreach ($empresas as $empresa):
            $empresaSelecionado = $visitante['id_empresa'] == $empresa['id'];
            $selecao = $empresaSelecionado ? "selected='selected'" : "";
            
          
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
      
    <button type="submit" class="btn btn-primary">Alterar</button>
    <button type="button" class="btn btn-warning" onClick="history.go(-1)">Cancelar</button>
  </form>
  <br>
  <!-- Fim do formulário -->
  
   <?php require_once ("rodape.php");