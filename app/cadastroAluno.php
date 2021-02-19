<?php 
@ob_start();
session_start();
include 'conexao.php';
include 'tratamentoSQLinjection.php';

try {

	$nomeCompleto = trata($_POST['nomeCompleto']);
	$nomeCompleto = isset($nomeCompleto) ? $nomeCompleto : false;

	$dataNascimento = trim($_POST['dataNascimento']);
	$dataNascimento = isset($dataNascimento) ? trataDatas($dataNascimento) : false;



	if (!$dataNascimento || !$nomeCompleto) {
		$_SESSION['error'] = true;
		$_SESSION['message'] = " <script> alert('Dados Invalidos'); </script>";
		header("Location: disciplinas.php");
		exit;
		
	}


	
	$sql="
		INSERT INTO Aluno(
			nomeCompleto,
			dataNascimento
		) VALUES (
			'$nomeCompleto',
			STR_TO_DATE('$dataNascimento', '%m/%d/%Y')
		)
	";

	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':nomeCompleto', $nomeCompleto, PDO::PARAM_STR);
	$stmt->bindParam(':dataNascimento', $dataNascimento, PDO::PARAM_STR);

	$stmt->execute();


	header("Location: aluno.php");

} catch (PDOException $e) {
	
	$_SESSION['error'] = true;
	$_SESSION['message'] = " <script> alert('Dados Invalidos!'); </script>";
	header("Location: aluno.php");
	
}