<?php
    require_once ("cabecalho.php");
    require_once ("conecta.php");
    require_once ("banco-departamentos.php");
    require_once ("logica-usuario.php");

    verificaUsuario();
   $id = $_GET['id'];
   $depto = buscaDepto($conexao,$id);
 

?>
<h1>Alterando de Departamentos</h1>
<!-- Início das mensagens de alertas vindas da logica de usuário -->
<hr>
<!-- Formulário de cadastro -->
<form action="altera-depto.php" method="post">
  <div class="form-row">
  <div class="form-group col-md-3">
      <label>Nome do Departamento</label>
      <input type="text" class="form-control" id="nomedepto" value="<?=$depto['nome']?>" name="nome">
      <input type="hidden" name="id" value="<?=$id?>">
    </div>
    </div>
      
    <button type="submit" class="btn btn-primary">Alterar</button>
    <button type="button" class="btn btn-warning" onClick="history.go(-1)">Cancelar</button>
</form>


<?php
require_once ("rodape.php");
?>