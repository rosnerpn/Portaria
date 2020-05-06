<?php
    require_once ("conecta.php");
    require_once ("banco-visitantes.php");
    require_once ("logica-usuario.php");
    $id = $_POST['id'];
    $nome = mysqli_real_escape_string($conexao,$_POST['nome']);
    $rg = mysqli_real_escape_string($conexao,$_POST['rg']);
    $rg = str_replace(".","",$rg);
    $rg = str_replace("-","",$rg);
    $cpf = mysqli_real_escape_string($conexao,$_POST['cpf']);
    $cpf = str_replace(".","",$cpf);
    $cpf= str_replace("-","",$cpf);
    $email = mysqli_real_escape_string($conexao,$_POST['email']);
    $telefone = mysqli_real_escape_string($conexao,$_POST['telefone']);
    $telefone = str_replace("(","",$telefone);
    $telefone= str_replace(")","",$telefone);
    $telefone= str_replace("-","",$telefone);
    $telefone= str_replace(" ","",$telefone);
    $celular = mysqli_real_escape_string($conexao,$_POST['celular']);
    $celular = str_replace("(","",$celular);
    $celular= str_replace(")","",$celular);
    $celular= str_replace("-","",$celular);
    $celular= str_replace(" ","",$celular);
    $id_empresa = mysqli_real_escape_string($conexao,$_POST['id_empresa']);


    if(alteraVisitantes($conexao,$id,$nome,$rg,$cpf,$email,$id_empresa,$telefone,$celular)){
        $_SESSION["success"] = "Visitante: $nome alterado com sucesso!";
         header("Location: visitantes.php");
    }else{
        $_SESSION["danger"] = "Não foi possível alterar o visitante!";
         header("Location: visitantes.php");
    }


?>