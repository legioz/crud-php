<?php 
include 'conexao.php';
session_start();

if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {

  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header("Location: index.php"); 
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
   <!-- Meta tags Obrigatórias -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="./css/main.css">
   <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
   <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
   <title>CRUD</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container col-lg-2 ">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="./aluno.php">Alunos</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="./disciplinas.php">Disciplina</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./curso.php">Curso</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./docente.php">Docente</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./turma.php">Turma</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./matricula.php">Matricula</a>
          </li>
        </ul>
      </div>
    </div>
   <div class="mr-5">
        <code class="text-right"><font color="grey">Bem vindo, <?php echo $_SESSION['login'] . " ";?></font></code>
    </div>
    <div>
        <a href="./index.php" class="badge badge-dark">Sair</a>
    </div>
  </nav>

<br>
<div class="row">
 <div class="col">
    <h1 class="ml-3">Disciplinas</h1>
</div>
<div class="col col-lg-2">
    <div class="col-xs-12 text-center">           <i class="fa fa-plus fa-5x"></i>          </div>
    <button  autofocus type="button" class="btn btn-success" data-toggle="modal" data-target="#addDisciplina">Novo Registro</button>
    <button type="button" class="btn btn-outline-dark" onclick="location.reload()">Atualizar</button>
</div>
</div>
<hr>
<br>

<!--  -------------------------- TABELA DISCIPLINAS --------------------------- -->

<?php 

$sql = "SELECT disciplina, nomeDisciplina FROM Disciplina;";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
        //var_dump($result);
?>

<div class="container">
 <table class="table table-hover">
    <thead>
       <tr>
          <th scope="col">Disciplina</th>
          <th scope="col">Nome Disciplina</th>
          <th scope="col">Opções</th>
     </tr>
</thead>
<tbody>
 <?php foreach ($result as $key => $value) : ?>
    <tr>
       <td><?=$value['disciplina'];?></td>
       <td><?=$value['nomeDisciplina'];?></td>
       <td>
          <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editaDisciplina" onclick="editaDisciplina( '<?=$value['nomeDisciplina'];?>', '<?=$value['disciplina'];?>')" >Editar</button>
          <button  type="submit" class="btn btn-danger btn-sm" onclick="deletaRegistro('excluirDisciplina', '<?php echo $value['disciplina']; ?>')">Deletar
          </button>
     </td>
</tr>
<?php endforeach ?>
</td>
</tr>
</tbody>
</table>
</div>



<!-- adiciona disciplina -->
<div class="modal" role="dialog" id="addDisciplina">
   <div class="modal-dialog" role="document">
      <div class="modal-content alTopModal">

         <form method="POST" action="cadastroDisciplina.php">

            <div class="modal-header">
               <h5 class="modal-title">Cadastro Disciplina</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
             </button>
        </div>
        <div class="modal-body">
         <!-- FORMULARIO AQUI-->
         <div class="form-group">
            <label>Nome Disciplina</label>
            <input type="text" class="form-control" name="nomeDisciplina" placeholder="" required>
       </div>
       <div class="form-group">
            <label>Código Disciplina</label>
            <input type="text" class="form-control" name="codigoDisciplina" placeholder="" required>
       </div>

  </div>
  <div class="modal-footer">
   <button type="submit" class="btn btn-primary">Salvar</button>
   <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
</div>
</form>
</div>
</div>
</div>


<!-- ---------------------------------------------edita disciplina -->
<div class="modal" role="dialog" id="editaDisciplina">
   <div class="modal-dialog" role="document"
   >        <div class="modal-content alTopModal">
      <form method="POST" action="editarDisciplina.php">
         <div class="modal-header">
            <h5 class="modal-title">Editar Disciplina</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
          </button>
     </div>
     <div class="modal-body">
      <div class="form-group">
         <label>Nome Disciplina</label>
         <input id="editaNome" type="text" class="form-control" name="nomeDisciplina" placeholder="" required>
    </div>
</div>
<div class="modal-body">
 <div class="form-group">
    <label>Código Disciplina</label>
    <input id="editaCodigo" type="text" class="form-control" name="codigoDisciplina" placeholder="" required>
</div>
</div>
<div class="modal-body">
 <div class="form-group">
    <input type="hidden" class="form-control" name="id_editavel" id="id_editavel">
</div>

<div class="modal-footer">
    <button type="submit" class="btn btn-primary">Salvar</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
</div>
</form>
</div>
</div>
</div>


<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<?php 
if($_SESSION['error'] == true){
   echo $_SESSION['message'];
}
$_SESSION['error'] = false;
?>

<script type="text/javascript" src="funcoes/funcoes.js"></script>

</body>
</html>