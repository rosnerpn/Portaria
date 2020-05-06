<?php
    require_once ("cabecalho.php");
    require_once ("conecta.php");
    require_once ("banco-departamentos.php");
    require_once ("logica-usuario.php");

    verificaUsuario();
   $id = $_GET['id'];
   if (deletaDepto($conexao,$id)){
    $_SESSION["success"] = "Departamento $id excluído com sucesso!";
    header("Location: departamentos.php"); 
   }
 

?>