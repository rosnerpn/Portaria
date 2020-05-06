<?php
    require_once ("conecta.php");
    require_once ("banco-funcionarios.php");
    require_once ("logica-usuario.php");

    $nome = mysqli_real_escape_string($conexao,$_POST['nome']);
    $rg = mysqli_real_escape_string($conexao,$_POST['rg']);
    $rg = str_replace(".","",$rg);
    $rg = str_replace("-","",$rg);
    $cpf = mysqli_real_escape_string($conexao,$_POST['cpf']);
    $cpf = str_replace(".","",$cpf);
    $cpf= str_replace("-","",$cpf);
    $email = mysqli_real_escape_string($conexao,$_POST['email']);
    $ramal = mysqli_real_escape_string($conexao,$_POST['ramal']);
    $matricula = mysqli_real_escape_string($conexao,$_POST['matricula']);
    $id_depto = mysqli_real_escape_string($conexao,$_POST['id_depto']);


    if(verficarRG($conexao,$rg)){
        $_SESSION["danger"] = "RG já cadastrado!";
         header("Location: funcionarios.php");
    }

    elseif(cadastraFuncionario($conexao,$nome,$rg,$cpf,$email,$ramal,$matricula,$id_depto)){
        $_SESSION["success"] = "Funcionário: $nome cadastrado com sucesso!";
         header("Location: funcionarios.php");
    }else{
        $_SESSION["danger"] = "Não foi possível cadastrar o funcionário!";
         header("Location: funcionarios.php");
    }


?>