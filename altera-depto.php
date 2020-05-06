<?php
    require_once ("cabecalho.php");
    require_once ("conecta.php");
    require_once ("banco-departamentos.php");
    require_once ("logica-usuario.php");
    verificaUsuario();
    $id = mysqli_real_escape_string($conexao,$_POST['id']);
    $nome = mysqli_real_escape_string($conexao,$_POST['nome']);
    
          
    if(alteraDepto($conexao,$nome,$id)){
        $_SESSION["success"] = "Departamento $nome alterado com sucesso!";
        header("Location: departamentos.php"); 
    }else{
        $_SESSION["danger"] = "Não foi possível alterar o departamento";
        header("Location: departamentos.php"); 
    }
    ?>