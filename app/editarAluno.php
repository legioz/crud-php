<?php 
@ob_start();
session_start();
include 'conexao.php';
include 'tratamentoSQLinjection.php';

try {

	$nome = trata($_POST['nome']);
	$nome = isset($nome) ? $nome : false;

	$dataNascimento = trim($_POST['dataNascimento']);
	$dataNascimento = isset($dataNascimento) ? trataDatas($dataNascimento) : false;

	$id_editavel = $_POST['id_editavel'];

	//var_dump($nome,$dataNascimento,$id_editavel); exit;
	if (!$dataNascimento || !$nome){

		$_SESSION['error'] = true;
		$_SESSION['message'] = " <script> alert('Dados Invalidos'); </script>";
		header("Location: aluno.php");
		exit;
		
	}

	$sql ="
        UPDATE
            ALUNO
        SET
            NOMECOMPLETO    =   '$nome'
        ,   DATANASCIMENTO  =   STR_TO_DATE('$dataNascimento', '%Y-%m-%d')
        WHERE
            ID  =   $id_editavel
        ;
	";

	$conn->exec($sql);
	//var_dump($sql);
	header("Location: aluno.php");

} catch (PDOException $e) {

	
	$_SESSION['error'] = true;
	$_SESSION['message'] = " <script> alert('Dados Inválidos, verifique a Data'); </script>";

	header("Location: aluno.php");
}