<?php 
@ob_start();
session_start();
include 'conexao.php';
include 'tratamentoSQLinjection.php';

try {
	
	$turma = trata($_POST['turma_']);
	$turma = isset($turma) ? $turma : false;
	
	$ano = is_int((int)$_POST['ano_']) ? trataNum($_POST['ano_']) : false;

	$semestre = is_int((int)$_POST['semestre_']) ? trataNum($_POST['semestre_']) :false;

	$curso = trim(strtoupper($_POST['curso_']));
	$curso = isset($curso) ? $curso : false;

	$disciplina = trim(strtoupper($_POST['disciplina_']));
	$disciplina = isset($disciplina) ? $disciplina : false;

	$docente = is_int((int)$_POST['matriculaDocente_']) ? (int)$_POST['matriculaDocente_'] : false;

//var_dump($turma,$ano);
//exit;
	if (!$ano || !$turma || !$semestre || !$curso || !$disciplina || !$docente) {
		
		$_SESSION['error'] = true;
		$_SESSION['message'] = " <script> alert('Dados Invalidos'); </script>";
		header("Location: turma.php");
		exit;
	}

	$sql = "
		INSERT INTO Turma ( 
			turma,
			ano,
			semestre,
			matriculaDocente,
			curso, 
			disciplina
		) VALUES (
			:turma, 
			:ano, 
			:semestre, 
			:docente,
			:curso,
			:disciplina
		)
	";

	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':turma', $turma, PDO::PARAM_STR);
	$stmt->bindParam(':ano', $ano, PDO::PARAM_INT);
	$stmt->bindParam(':semestre', $semestre, PDO::PARAM_INT);
	$stmt->bindParam(':curso', $curso, PDO::PARAM_STR);
	$stmt->bindParam(':disciplina', $disciplina, PDO::PARAM_STR);
	$stmt->bindParam(':docente', $docente, PDO::PARAM_INT);

	$stmt->execute();

	header("Location: turma.php");
} catch (PDOException $e) {

	$_SESSION['error'] = true;
	$_SESSION['message'] = " <script> alert('Dados Invalidos!'); </script>";
	header("Location: turma.php");
}