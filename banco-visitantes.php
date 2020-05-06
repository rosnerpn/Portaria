<?php

function cadastraVisitantes($conexao,$nome,$rg,$cpf,$email,$id_empresa,$telefone,$celular){
    
    $query = "insert into visitantes (nome,rg,cpf,email,id_empresa,telefone,celular) 
	values ('$nome','$rg','$cpf','$email',$id_empresa,'$telefone','$celular')";
    return mysqli_query($conexao,$query);
}

function listaVisitantes($conexao){
    $visitantes = array();
    $resultado = mysqli_query($conexao,"select V.id,V.nome,V.rg,V.cpf,V.telefone,V.celular,V.email,E.nome as id_empresa
    from visitantes as V
    left join empresas as E
    on V.id_empresa = E.id;");
    while($visitante = mysqli_fetch_assoc($resultado)){
        array_push($visitantes, $visitante);
    }
    return $visitantes;
}

function deletaVisitante($conexao,$id){
	$sql = "delete from visitantes where id = {$id}";
	return mysqli_query($conexao, $sql);
}
	
function buscaVisitante($conexao,$id){
	$sql = "select * from visitantes where id = {$id}";
	$resultado = mysqli_query($conexao, $sql);
	return mysqli_fetch_assoc($resultado);

}



function verficarRG2($conexao,$rg){
	$sql = "select rg from visitantes where rg = '{$rg}' ";
	$resultado = mysqli_query($conexao,$sql);
	$rg = mysqli_fetch_assoc($resultado);

    return $rg;
}

function alteraVisitantes($conexao,$id,$nome,$rg,$cpf,$email,$id_empresa,$telefone,$celular){
    
    $query = "update visitantes set nome = '$nome',rg = '$rg', cpf = '$cpf',email = '$email',id_empresa = $id_empresa,telefone = '$telefone',celular = '$celular' where id = '$id';";
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