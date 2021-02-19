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

	$id = $_POST['id_editavel'];

	$sql = "
		UPDATE Curso
		SET curso = '$codigoCurso', nomeCurso = '$nomeCurso'
		WHERE id = $id
	";

	$conn->exec($sql);

 header("Location: curso.php");

} catch (PDOException $e) {

	header("Location: curso.php");
	$_SESSION['error'] = true;
	$_SESSION['message'] = " <script> alert('Não foi possivel editar pois ja existe um Curso com este Código!'); </script>";
}