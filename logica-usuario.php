<?php
session_start();

function usuarioEstaLogado(){
    return isset($_SESSION["usuario_logado"]);
}

function verificaUsuario(){
    if(!usuarioEstaLogado()){
        $_SESSION["danger"] = "Você não tem acesso a está Funcionalidade.";
        header("Location: index.php");
        Die();
    }
}

function usuarioLogado(){
    return $_SESSION["usuario_logado"] ;
} 

function logaUsuario($nome){
    
    $_SESSION["usuario_logado"] = $nome; 
}

function logout(){
    session_destroy();
    session_start();
}

function salvaLog($conexao,$usuario2,$ip,$msg){
    $sql = "insert into logs (usuario,ip,mensagem) values ('$usuario2','$ip','$msg')";
    $resultado = mysqli_query($conexao,$sql);
    return $resultado;
}

function get_client_ip_server() {
    $ipaddress = '';
    if ($_SERVER['HTTP_CLIENT_IP'])
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if($_SERVER['HTTP_X_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if($_SERVER['HTTP_X_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if($_SERVER['HTTP_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if($_SERVER['HTTP_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if($_SERVER['REMOTE_ADDR'])
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
 
    return $ipaddress;
}

?>