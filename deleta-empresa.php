<?php
    require_once ("cabecalho.php");
    require_once ("conecta.php");
    require_once ("banco-empresa.php");
    require_once ("logica-usuario.php");

    verificaUsuario();
   $id = $_GET['id'];
   if (deletaEmpresa($conexao,$id)){
    $_SESSION["success"] = "Empresa excluída com sucesso!";
    header("Location: empresa.php"); 
   }
 

?>