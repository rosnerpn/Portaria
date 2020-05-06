<?php

function cadastraFuncionario($conexao,$nome,$rg,$cpf,$email,$ramal,$matricula,$id_depto){
    
    $query = "insert into funcionarios (nome,matricula,email,id_departamento,rg,cpf,ramal) 
        values ('$nome','$matricula','$email','$id_depto','$rg','$cpf','$ramal')";
    return mysqli_query($conexao,$query);
}

function listaFuncionarios($conexao){
    $funcionarios = array();
    $resultado = mysqli_query($conexao,"select F.id,F.nome,F.matricula,F.email,D.nome as id_departamento,F.rg,F.cpf,F.ramal
    from funcionarios as F
    join departamentos as D
    on F.id_departamento = D.id;");
    while($funcionario = mysqli_fetch_assoc($resultado)){
        array_push($funcionarios, $funcionario);
    }
    return $funcionarios;
}

function deletafuncionario($conexao,$id){
	$sql = "delete from funcionarios where id = {$id}";
	return mysqli_query($conexao, $sql);
}
	
function buscaFuncionario($conexao,$id){
	$sql = "select * from funcionarios where id = {$id}";
	$resultado = mysqli_query($conexao, $sql);
	return mysqli_fetch_assoc($resultado);

}



function verficarRG($conexao,$rg){
	$sql = "select rg from funcionarios where rg = '{$rg}' ";
	$resultado = mysqli_query($conexao,$sql);
	$rg = mysqli_fetch_assoc($resultado);

    return $rg;
}

function alteraFuncionario($conexao,$id,$nome,$matricula,$email,$id_depto,$rg,$cpf,$ramal){
    
    $query = "update funcionarios set nome = '$nome',matricula = '$matricula', email = '$email',id_departamento = '$id_depto',rg = '$rg',cpf = '$cpf',ramal = '$ramal' where id = '$id';";
	return mysqli_query($conexao,$query);
}
	function mask($val, $mask)
	{
	 $maskared = '';
	 $k = 0;
	 for($i = 0; $i<=strlen($mask)-1; $i++)
	 {
	 if($mask[$i] == '#')
	 {
	 if(isset($val[$k]))
	 $maskared .= $val[$k++];
	 }
	 else
	 {
	 if(isset($mask[$i]))
	 $maskared .= $mask[$i];
	 }
	 }
	 return $maskared;
	}
?>