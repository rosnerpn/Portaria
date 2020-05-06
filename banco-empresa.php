<?php
    function cadastraEmpresa($conexao,$nome,$cnpj,$ie,$endereco,$numero,$bairro,$cidade,
    $estado,$cep,$complemento,$telefone,$celular){
        $sql = "insert into empresas (nome,cnpj,ie,endereco,numero,bairro,cidade,
            estado,cep,complemento,telefone,celular) 
                values('{$nome}','{$cnpj}','{$ie}','{$endereco}','{$numero}',
                    '{$bairro}','{$cidade}','{$estado}','{$cep}','{$complemento}','{$telefone}','{$celular}')";
    return mysqli_query($conexao,$sql);
    }

    function listaEmpresas($conexao){
        $empresas = array();
        $resultado = mysqli_query($conexao,"select * from empresas;");
        while($empresa = mysqli_fetch_assoc($resultado)){
            array_push($empresas, $empresa);
        }
        return $empresas;
    }

    function deletaEmpresa($conexao,$id){
        $sql = "delete from empresas where id = {$id}";
        return mysqli_query($conexao, $sql);
    }
    
    function buscaEmpresa($conexao,$id){
        $sql = "select * from empresas where id = {$id}";
        $resultado = mysqli_query($conexao, $sql);
        return mysqli_fetch_assoc($resultado);
    
    }

    function alteraEmpresa($conexao,$id,$nome,$cnpj,$ie,$endereco,$numero,$bairro,$cidade,
    $estado,$cep,$complemento,$telefone,$celular){
        $sql = "update empresas set nome ='{$nome}',cnpj ='{$cnpj}',ie='{$ie}',endereco ='{$endereco}',
            numero ='{$numero}',bairro ='{$bairro}',cidade ='{$cidade}',estado ='{$estado}',
                cep='{$cep}',complemento ='{$complemento}',
                    telefone = '{$telefone}',celular ='{$celular}' where id = '{$id}'";
    return mysqli_query($conexao,$sql);
    }

    function listaEstados($conexao){
        $estados = array();
        $resultado = mysqli_query($conexao,"select * from estados");
        while($estado = mysqli_fetch_assoc($resultado)){
            array_push($estados, $estado);
        }
        return $estados;
    }

    function verficarcnpj($conexao,$cnpj){
        $sql = "select cnpj from empresas where cnpj = '{$cnpj}' ";
        $resultado = mysqli_query($conexao,$sql);
        $cnpj = mysqli_fetch_assoc($resultado);
    
        return $cnpj;
    }

