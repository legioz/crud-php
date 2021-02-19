<?php 
@ob_start();
session_start();
include 'conexao.php';

$turma = $_GET['id'];


try {
	$sql = "
		DELETE FROM 
			turma 
		WHERE 
			id = '$turma'
	";

	$conn->exec($sql);
	//var_dump($sql);
	echo "Registro deletado com sucesso";
	
	header("Location: turma.php");

} catch (PDOException $e) {

	header("Location: turma.php");
	$_SESSION['error'] = true;
	$_SESSION['message'] = " <script> alert('Não foi possivel deletar pois a Turma esta vinculada a uma Matricula'); </script>";

}