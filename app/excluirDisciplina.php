<?php
@ob_start();
session_start();
include 'conexao.php';


$disciplina = $_GET['id'];

try {
	$sql = "
		DELETE FROM
			Disciplina
		WHERE 
			disciplina = '$disciplina'
	";

	$conn->exec($sql);

	header("Location: disciplinas.php");

} catch (PDOException $e) {
	
	
	header("Location: disciplinas.php");

	$_SESSION['error'] = true;
	$_SESSION['message'] = " <script> alert('Não foi possivel deletar pois a disciplina esta vinculada a uma turma!'); </script>";
}