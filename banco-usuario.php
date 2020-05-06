<?php

function buscaUsuario ($conexao,$email,$senha){
    $senhaMd5 = md5($senha);
    $email = ($email);
    $query = "select * from usuarios where email= '{$email}' and senha ='{$senhaMd5}' ";
    $resultado = mysqli_query($conexao,$query);
    $usuario = mysqli_fetch_assoc($resultado);

    return $usuario;

}

function verificaEmail($conexao,$email){
    $email = $email;
    $query = "select email from usuarios where email = '{$email}'";
    $resultado = mysqli_query($conexao,$query);
    $usuario = mysqli_fetch_assoc($resultado);

    return $usuario;

}

function cadastraUsuario($conexao,$nome,$email,$login,$senha){
    
    $query = "insert into usuarios (nome,email,login,senha) values ('{$nome}','{$email}','{$login}','{$senha}')";
    return mysqli_query($conexao,$query);
}

function listaUsuarios($conexao){
    $usuarios = array();
    $resultado = mysqli_query($conexao,"select * from usuarios");
    while($usuario = mysqli_fetch_assoc($resultado)){
        array_push($usuarios, $usuario);
    }
    return $usuarios;
}
    

?>