<?php
    require_once ("conecta.php");
    require_once ("banco-visitantes.php");
    require_once ("logica-usuario.php");
    require_once ("banco-entrada.php");
    date_default_timezone_set('America/Sao_Paulo');

    $id_visitante = mysqli_real_escape_string($conexao,$_POST['id']);
    $id_funcionario = mysqli_real_escape_string($conexao,$_POST['id_funcionario']);
    $placa = strtoupper(mysqli_real_escape_string($conexao,$_POST['placa']));
    $veiculo= strtoupper(mysqli_real_escape_string($conexao,$_POST['veiculo']));
    $data_entrada = date("Y-m-d H:i:s");
    
    
    if(cadastraEntrada($conexao,$id_visitante,$id_funcionario,$placa,$veiculo,$data_entrada)){
        $_SESSION["success"] = "Entrada liberada com sucesso!";
         header("Location: home.php");
    }else{
        $_SESSION["danger"] = "Não foi possível liberar a Entrada!";
         header("Location: visitantes.php");
    }

   

    
?>