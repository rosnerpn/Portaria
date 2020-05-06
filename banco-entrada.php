<?php

function cadastraEntrada($conexao,$id_visitante,$id_funcionario,$placa,$veiculo,$data_entrada){
    
    $query = "insert into movimentacao (id_visitante,id_funcionario,placa,veiculo,entrada) 
	values ($id_visitante,$id_funcionario,'$placa','$veiculo','$data_entrada')";
    return mysqli_query($conexao,$query);
}


function listaVisitantesEntrada($conexao,$id){
    $visitantes = array();
    $resultado = mysqli_query($conexao,"select v.nome as nome,v.rg,v.cpf,v.telefone,v.celular,v.id_empresa,e.nome as empresa
	from visitantes as v 
    inner join empresas as e
		on v.id_empresa = e.id;");
    while($visitante = mysqli_fetch_assoc($resultado)){
        array_push($visitantes, $visitante);
    }
    return $visitantes;
}


	
function buscaVisitante2($conexao,$id){
	$sql = "select v.nome as nome,v.rg,v.cpf,v.telefone,v.celular,v.id_empresa,e.nome as empresa
	from visitantes as v 
    inner join empresas as e
		on v.id_empresa = e.id where v.id = {$id}";
	$resultado = mysqli_query($conexao, $sql);
	return mysqli_fetch_assoc($resultado);

}


function listaEntrada($conexao){
    $entradas = array();
    $resultado = mysqli_query($conexao,"select movimentacao.id,v.nome as 'nome visitante',e.nome as 'Nome Empresa',f.nome as 'Nome Funcionário',placa,veiculo,entrada,saida
	from movimentacao
    inner join visitantes v on id_visitante = v.id
    inner join funcionarios f on id_funcionario = f.id
    inner join empresas e on v.id_empresa = e.id
    where saida is null;");
    while($entrada = mysqli_fetch_assoc($resultado)){
        array_push($entradas, $entrada);
    }
    return $entradas;
}

function saidaVisitante($conexao,$id,$data_saida){
    $sql = "update movimentacao set saida = '$data_saida' where id = $id";
    return mysqli_query($conexao,$sql);
}



function listaSaida($conexao){
    $saidas = array();
    $resultado = mysqli_query($conexao,"select movimentacao.id,v.nome as 'nome visitante',e.nome as 'Nome Empresa',f.nome as 'Nome Funcionário',
    placa,veiculo,entrada,saida,TIMEDIFF (saida,entrada) as total
        from movimentacao
        inner join visitantes v on id_visitante = v.id
        inner join funcionarios f on id_funcionario = f.id
        inner join empresas e on v.id_empresa = e.id;");
    while($saida = mysqli_fetch_assoc($resultado)){
        array_push($saidas, $saida);
    }
    return $saidas;
}
?>


