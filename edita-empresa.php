<?php
    require_once ("cabecalho.php");
    require_once ("logica-usuario.php");
    require_once ("banco-departamentos.php");
    require_once ("banco-empresa.php");
    require_once ("conecta.php");
    $id = $_GET['id'];
    $empresa =buscaEmpresa($conexao,$id);
    $estados =listaEstados($conexao);
   
    
   
    verificaUsuario();
?>
<h1>Editando de Empresas</h1>

<hr>
<!-- Formulário de cadastro -->
<form action="altera-empresa.php" method="post">
<input type="hidden" name="id" value="<?=$id?>">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Nome</label>
      <input type="text" class="form-control" id="nome" required="required" value="<?=$empresa['nome']?>" name="nome">
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">CNPJ</label>
      <input type="text" class="form-control"  id="cnpj" required="required" value="<?=$empresa['cnpj']?>" name="cnpj">
    </div>

    <div class="form-group col-md-2">
      <label for="inputPassword4">Inscrição Estadual</label>
      <input type="text" class="form-control"  id="ie" value="<?=$empresa['ie']?>" name="ie">
    </div>

    <div class="form-group col-md-2">
      <label for="inputCity">CEP</label>
      <input type="text" class="form-control" id="cep"  value="<?=$empresa['cep']?>" name="cep">
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">Endereço</label>
      <input type="text" class="form-control" id="rua" required="required" value="<?=$empresa['endereco']?>" name="endereco">
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">Número</label>
      <input type="text" class="form-control" id="numero" required="required" value="<?=$empresa['numero']?>" name="numero">
    </div>
    <div class="form-group col-md-2">
      <label for="inputCity">Bairro</label>
      <input type="text" class="form-control" id="bairro" required="required" value="<?=$empresa['bairro']?>" name="bairro">
    </div>
    <div class="form-group col-md-2">
      <label for="inputCity">Cidade</label>
      <input type="text" class="form-control" id="cidade" required="required" value="<?=$empresa['cidade']?>" name="cidade">
    </div>
    <div class="form-group col-md-2">
      <label for="inputCity">Estado</label>
      <input type="text" class="form-control" id="uf" placeholder="UF" name="estado" value="<?=$empresa['estado']?>">
    </div>
    
    <div class="form-group col-md-4">
      <label for="inputCity">Complemento</label>
      <input type="text" class="form-control" id="complemento"  value="<?=$empresa['complemento']?>" name="complemento">
    </div>
    <div class="form-group col-md-2">
      <label for="inputCity">Telefone</label>
      <input type="text" class="form-control" id="telefone" required="required" value="<?=$empresa['telefone']?>" name="telefone">
    </div>
    <div class="form-group col-md-2">
      <label for="inputCity">Celular</label>
      <input type="text" class="form-control" id="celular"  value="<?=$empresa['celular']?>" name="celular">
    </div>
    </div>
      
    <button type="submit" class="btn btn-primary">Alterar</button>
    <button type="button" class="btn btn-warning" onClick="history.go(-1)">Cancelar</button>
  </form>
  <br>
  <!-- Fim do formulário -->
  <?php require_once ("rodape.php");