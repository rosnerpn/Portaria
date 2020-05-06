<?php
    require_once ("conecta.php");
    require_once ("banco-departamentos.php");
    require_once ("logica-usuario.php");

    $nomedepto = mysqli_real_escape_string($conexao,$_POST['nomedepto']);

    if (cadastraDepto($conexao,$nomedepto)){
        $_SESSION["success"] = "Departamento $nomedepto cadastrado com sucesso!";
    header("Location: departamentos.php"); 
    }else{
        $_SESSION["danger"] = "Não foi possível cadastrar o departamento: $nomedepto!";
        header("Location: departamentos.php");
    }
?>