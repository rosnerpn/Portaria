<?php
    function cadastraDepto($conexao,$nome){
        $sql = "insert into departamentos (nome) values ('{$nome}')";
        return mysqli_query($conexao,$sql);
    }

    function listaDepto($conexao){
        $departamentos = array();
        $resultado = mysqli_query($conexao,"select * from departamentos");
        while($departamento = mysqli_fetch_assoc($resultado)){
            array_push($departamentos, $departamento);
        }
        return $departamentos;
    }

    function buscaDepto($conexao,$id){
        $sql = "select nome from departamentos where id = {$id}";
        $resultado = mysqli_query($conexao, $sql);
	    return mysqli_fetch_assoc($resultado);

    }

    function alteraDepto($conexao,$nome,$id){
        
        $sql = "update departamentos set nome = '{$nome}' where id = {$id}";
        return mysqli_query($conexao,$sql);
    }

    function deletaDepto($conexao,$id){
        $sql = "delete from departamentos where id = {$id}";
        return mysqli_query($conexao, $sql);
    }
?>
