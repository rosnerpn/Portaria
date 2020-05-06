<?php
    require_once ("cabecalho.php");
    require_once ("conecta.php");
    require_once ("banco-visitantes.php");
    require_once ("logica-usuario.php");

    verificaUsuario();
   $id = $_GET['id'];
   if (deletaVisitante($conexao,$id)){
    $_SESSION["success"] = "Visitante $id excluído com sucesso!";
    header("Location: visitantes.php"); 
   }
 

?>