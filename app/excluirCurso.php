<?php
@ob_start();
session_start();
include 'conexao.php';

	$curso = $_GET['id'];
	try {

	
	$sql = "
			DELETE FROM Curso
			WHERE curso = '$curso'
	";
	
	$conn->exec($sql);
	
	echo "Registro deletado com sucesso";
	
	header("Location: curso.php");


} catch (PDOException $e) {

	header("Location: curso.php");

	$_SESSION['error'] = true;
	$_SESSION['message'] = " <script> alert('Não foi possivel deletar pois o currso esta vinculado a uma turma!'); </script>";

}