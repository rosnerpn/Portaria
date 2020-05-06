<?php
    require_once ("cabecalho.php");
    require_once ("conecta.php");
    require_once ("banco-funcionarios.php");
    require_once ("logica-usuario.php");

    verificaUsuario();
   $id = $_GET['id'];
   if (deletafuncionario($conexao,$id)){
    $_SESSION["success"] = "Funcionário $id excluído com sucesso!";
    header("Location: funcionarios.php"); 
   }
 

?>