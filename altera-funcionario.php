<?php
    require_once ("conecta.php");
    require_once ("banco-funcionarios.php");
    require_once ("logica-usuario.php");
    $id =$_POST['id'];
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


        if(alteraFuncionario($conexao,$id,$nome,$matricula,$email,$id_depto,$rg,$cpf,$ramal)){
        $_SESSION["success"] = "Funcionário: $nome alterado com sucesso!";
         header("Location: funcionarios.php");
        }else{
            mysql_error();
        }
        
?>