<?php
require_once ("conecta.php");
require_once ("banco-usuario.php");
require_once ("logica-usuario.php");
//require_once ("logica-usuario.php");

  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
 // $ip = get_client_ip_server();
  $email = mysqli_real_escape_string($conexao,$_POST["email"]);
  $senha = mysqli_real_escape_string($conexao,$_POST["senha"]);

  $usuario = buscaUsuario($conexao,$email,$senha);
  
  
 if ($usuario == null){
  $_SESSION["danger"] = "Usuário ou senha inválida.";
     header("Location: index.php");
 }else{
    //$_SESSION["success"] = "Logado com Sucesso.";
    logaUsuario($usuario["nome"]); 
     $usuario2 = $usuario["nome"];
     $msg='logou';
     salvaLog($conexao,$usuario2,$ip,$msg);
    header("Location: home.php");
      
 }
 die();
?>