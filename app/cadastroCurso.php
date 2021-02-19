<?php 
@ob_start();
session_start();
include 'conexao.php';
include 'tratamentoSQLinjection.php';
	
	try {

		$nomeCurso = trata($_POST['nomeCurso']);
		$nomeCurso = isset($nomeCurso) ? $nomeCurso : false;

		$codigoCurso = trata($_POST['codigoCurso']);
		$codigoCurso = isset($codigoCurso) ? $codigoCurso : false;

		if (!$codigoCurso || !$nomeCurso) {
			$_SESSION['error'] = true;
			$_SESSION['message'] = " <script> alert('Dados Invalidos'); </script>";
			header("Location: curso.php");
			exit;
			
		}

		$sql = "
				INSERT INTO Curso(
					curso, 
					nomeCurso
				) VALUES (
					:codigoCurso, 
					:nomeCurso
			)
			";

		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':codigoCurso', $codigoCurso, PDO::PARAM_STR);
		$stmt->bindParam(':nomeCurso', $nomeCurso, PDO::PARAM_STR);
		$stmt->execute();

		header("Location: curso.php");

	} catch (PDOException $e) {

		$_SESSION['error'] = true;
		$_SESSION['message'] = " <script> alert('O curso ja existe'); </script>";

		header("Location: curso.php");
	}