<?php 
@ob_start();
session_start();
include 'conexao.php';
include 'tratamentoSQLinjection.php';
// var_dump($_POST);
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
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
		$sql = "
				INSERT INTO Disciplina(
					nomeDisciplina, 
					disciplina
				) VALUES (
					:nomeDisciplina, 
					:codigoDisciplina
				)
				";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':nomeDisciplina', $nomeDisciplina, PDO::PARAM_STR);
		$stmt->bindParam(':codigoDisciplina', $codigoDisciplina, PDO::PARAM_STR);
		$stmt->execute();
		
		header("Location: disciplinas.php");
	} catch(PDOException $e) {

		
	$_SESSION['error'] = true;
	$_SESSION['message'] = " <script> alert('Dados Invalidos!'); </script>";
	header("Location: disciplinas.php");
	

	}