<?php
@ob_start();
session_start();
include 'conexao.php';

	$id = $_GET['id'];
	try {

	
	$sql = "
			DELETE FROM Aluno
			WHERE id = '$id'
	";
	
	$conn->exec($sql);
	
	echo "Registro deletado com sucesso";
	
	header("Location: aluno.php");


} catch (PDOException $e) {

	header("Location: aluno.php");

	$_SESSION['error'] = true;
	$_SESSION['message'] = " <script> alert('Não foi possivel deletar pois o Aluno esta vinculado a uma Matricula!'); </script>";

}