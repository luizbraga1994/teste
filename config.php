<?php
	$host = 'localhost';
	$usuario = 'root';
	$senha = '';
	$banco = 'teste';

	$con = new mysqli($host, $usuario, $senha, $banco);

	if(mysqli_connect_error()){
		print("Erro ao conectar-se ao banco de dados. <br>");
		echo myslqi_connect_error();
		exit();
	}
?>