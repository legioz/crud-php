<?php 
@ob_start();
session_start();

include 'conexao.php';


$matriculaDocente = $_GET['id'];
$matriculaDocente = (int) $matriculaDocente;


try {

	$sql = "
			DELETE FROM Docente
			WHERE matriculaDocente = $matriculaDocente
	";
	
	$conn->exec($sql);
	
	echo "Registro deletado com sucesso";
	
	header("Location: docente.php");


} catch (PDOException $e) {

	header("Location: docente.php");

	$_SESSION['error'] = true;
	$_SESSION['message'] = " <script> alert('Não foi possivel deletar pois o docente esta vinculado a uma turma!'); </script>";
	//$_SESSION['message'] = " Não foi possivel deletar pois o docente esta vinculado a uma turma";
	
}