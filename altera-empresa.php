<?php
    require_once ("conecta.php");
    require_once ("banco-empresa.php");
    require_once ("logica-usuario.php");

    $id = $_POST['id'];
    $nome = mysqli_real_escape_string($conexao,$_POST['nome']);
    $cnpj = mysqli_real_escape_string($conexao,$_POST['cnpj']);
    $cnpj = str_replace(".","",$cnpj);
    $cnpj = str_replace("/","",$cnpj);
    $cnpj = str_replace("-","",$cnpj);
    $ie = mysqli_real_escape_string($conexao,$_POST['ie']);
    $endereco = mysqli_real_escape_string($conexao,$_POST['endereco']);
    $numero = mysqli_real_escape_string($conexao,$_POST['numero']);
    $bairro = mysqli_real_escape_string($conexao,$_POST['bairro']);
    $cidade = mysqli_real_escape_string($conexao,$_POST['cidade']);
    $estado = mysqli_real_escape_string($conexao,$_POST['estado']);
    $cep = mysqli_real_escape_string($conexao,$_POST['cep']);
    $cep = str_replace(".","",$cep);
    $cep = str_replace("-","",$cep);
    $complemento = mysqli_real_escape_string($conexao,$_POST['complemento']);
    $telefone = mysqli_real_escape_string($conexao,$_POST['telefone']);
    $telefone = str_replace("(","",$telefone);
    $telefone = str_replace(")","",$telefone);
    $telefone = str_replace(" ","",$telefone);
    $telefone = str_replace("-","",$telefone);
    
    $celular = mysqli_real_escape_string($conexao,$_POST['celular']);
    $celular = str_replace("(","",$celular);
    $celular = str_replace(")","",$celular);
    $celular = str_replace(" ","",$celular);
    $celular = str_replace("-","",$celular);

    if(alteraEmpresa($conexao,$id,$nome,$cnpj,$ie,$endereco,$numero,$bairro,$cidade,
            $estado,$cep,$complemento,$telefone,$celular)){
        $_SESSION["success"] = "Empresa: $nome alterada com sucesso!";
         header("Location: empresa.php");
         var_dump (cadastraEmpresa);
    }else{
        $_SESSION["danger"] = "Não foi possível alterar a empresa!";
         header("Location: empresa.php");
    }


?>s