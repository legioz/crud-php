<?php 
@ob_start();
session_start();
include 'conexao.php';
include 'tratamentoSQLinjection.php';

try{
	
	$nome = trata($_POST['nomeCompleto']);
	$nome = isset($nome) ? $nome : false;

	$matricula = trata($_POST['matriculaDocente']);
	$matricula = isset($matricula) ? $matricula : false;

	if (!$nome || !$matricula) {

		$_SESSION['error'] = true;
		$_SESSION['message'] = " <script> alert('Dados Invalidos'); </script>";
		header("Location: docente.php");
		exit;
		
	}
	
	$sql= "
		UPDATE Docente
		SET nomeCompleto = '$nome'
		WHERE matriculaDocente = $matricula
	";

	$conn->exec($sql);

	header("Location: docente.php");
} catch (PDOException $e) {

	$_SESSION['error'] = true;
	$_SESSION['message'] = " <script> alert('Dados Inválidos!'); </script>";
	header("Location: docente.php");
}