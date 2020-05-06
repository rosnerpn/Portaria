<?php
 
    require_once ("conecta.php");
    
    require_once ("logica-usuario.php");
    require_once ("banco-entrada.php");
    date_default_timezone_set('America/Sao_Paulo');
    $data_saida = date("Y-m-d H:i:s");
    

    verificaUsuario();
   $id = $_GET['id'];
   $saida_visitante = saidaVisitante($conexao,$id,$data_saida);

   if (saidaVisitante($conexao,$id,$data_saida)){
    $_SESSION["success"] = "Saída liberada com sucesso!";
    header("Location: home.php");
}else{
   $_SESSION["danger"] = "Não foi possível libera a saída!";
    header("Location: home.php");
}
   
?>



