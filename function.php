<?php
	require_once ("conecta.php");
	
	function retorna($rg,$conexao){
		$sql = "select * from visitantes where rg = '$rg' LIMIT 1";
		$resultado = mysqli_query($conexao,$sql);
		if ($resultado->num_rows){
			$row_visitante = mysqli_fetch_assoc ($resultado);
			$valores['nome'] = $row_visitante['nome'];
		}else
		$valores['nome'] = 'Visitante não encontrado';
	} return json_encode($valores);
	
	if(isset($_GET['rg'])){
		echo retorna ($_GET['rg'],$conexao);
	}

?>