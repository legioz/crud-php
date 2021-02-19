function deletaRegistro(tipo, id) {

	if (confirm('Deseja deletar o registro?')) {

		window.location.href = tipo + '.php?id=' + id;
	}
}

function editaAluno(id, nome, dataNascimento) {

	document.getElementById('id_editavel').value= id;
	document.getElementById('editaDataNascimento').value= dataNascimento;
	document.getElementById('editaNome').value= nome;
}

function edita2(id, nome, codigo) {

	document.getElementById('id_editavel').value= id;
	document.getElementById('editaNome').value= nome;
	document.getElementById('editaCodigo').value= codigo;
}

function editaDisciplina(nome, codigo) {

	document.getElementById('id_editavel').value= codigo;
	document.getElementById('editaNome').value= nome;
	document.getElementById('editaCodigo').value= codigo;
}

function editaDocente(id, nome) {

	document.getElementById('id_editavel').value= id;
	document.getElementById('nomeCompleto').value= nome;
}

function editaTurma(id, codigoTurma, ano, semestre, curso, disciplina, docente) {


		document.getElementById('id_editavel').value = id;
		document.getElementById('codigoTurma').value = codigoTurma;
		document.getElementById('ano').value = ano;
		document.getElementById('semestre').value = semestre;


		function seleciona(valorS, valorR) {
			$(document).ready(function() {
				$(valorS).each(function(){
					var opcao = $(this).val();
					if (opcao == valorR) {
						$(this).prop('selected', true);
					}
				});
			});
		}
		seleciona("#curso_ option", curso);
		seleciona("#disciplina_ option", disciplina);
		seleciona("#docente_ option", docente);
}

function editaMatricula(id, ra, turma) {

	document.getElementById('raAluno').value = ra;
	document.getElementById('id_editavel').value = id;
	// console.log(id) //id da Matricula
	// console.log(turma) //id turma

	$(document).ready(function() {
	
		$("#codTurma option").each(function() {
			
			var option = $(this).val();
			if(option == turma) {
				
				$(this).prop('selected', true);
			}
		});
	});
}