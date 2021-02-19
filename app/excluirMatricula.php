<?php 
@ob_start();
session_start();

include 'conexao.php';


$id = $_GET['id'];
$id = (int) $id;


try {

	$sql = "
			DELETE FROM Matricula
			WHERE id = $id
	";
	
	$conn->exec($sql);
	
	echo "Registro deletado com sucesso";
	
	header("Location: matricula.php");


} catch (PDOException $e) {

	header("Location: matricula.php");

	$_SESSION['error'] = true;
	$_SESSION['message'] = " <script> alert('Não foi possivel deletar a matricula'); </script>";
	//$_SESSION['message'] = " Não foi possivel deletar pois o matricula esta vinculado a uma turma";
	
}