<?php 
@ob_start();
session_start();
include 'conexao.php';
include 'tratamentoSQLinjection.php';

try {

	$nomeDisciplina = trata($_POST['nomeDisciplina']);
	$nomeDisciplina = isset($nomeDisciplina) ? $nomeDisciplina : false;
	$codigoDisciplina = trata($_POST['codigoDisciplina']);
	$codigoDisciplina = isset($codigoDisciplina) ? $codigoDisciplina : false;


	if (!$codigoDisciplina || !$nomeDisciplina) {

		$_SESSION['error'] = true;
		$_SESSION['message'] = " <script> alert('Dados Invalidos'); </script>";
		header("Location: disciplinas.php");
		exit;
	}

	$id_editavel = $_POST['id_editavel'];

	$sql = "
		UPDATE Disciplina
		SET disciplina = '$codigoDisciplina', nomeDisciplina = '$nomeDisciplina'
		WHERE disciplina = '$id_editavel';
	";
	
	// print_r($sql);
	$conn->exec($sql);

	header("Location: disciplinas.php");

} catch (PDOException $e) {

	$_SESSION['error'] = true;
	$_SESSION['message'] = " <script> alert('O Código da Disciplina ja existe'); </script>";

	header("Location: disciplinas.php");
}