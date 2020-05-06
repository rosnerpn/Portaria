<?php
require_once ("banco-usuario.php");
require_once ("conecta.php");
require_once ("logica-usuario.php");

verificaUsuario();

$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$login = mysqli_real_escape_string($conexao,$_POST['login']);
$email = mysqli_real_escape_string($conexao,$_POST['email']);
$senha = mysqli_real_escape_string($conexao,md5 ($_POST['senha']));
$confirmarsenha = mysqli_real_escape_string($conexao,md5 ($_POST['confirmarsenha']));

if(verificaEmail($conexao,$email)){
    $_SESSION["danger"] = "Email já está em uso!";
    header("Location: usuarios.php"); 
    die();
}

if($senha != $confirmarsenha){
    $_SESSION["danger"] = "Senhas digitadas não são iguais!";
     header("Location: usuarios.php");
}else{
        cadastraUsuario($conexao,$nome,$email,$login,$senha);
        $_SESSION["success"] = "Usuário: $nome cadastrado com sucesso!";
         header("Location: usuarios.php");
    
}
   
?>