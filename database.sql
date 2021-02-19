CREATE database IF NOT EXISTS  db;
USE db;
create table aluno
(
	id int auto_increment
		primary key,
	nomeCompleto varchar(50) not null,
	dataNascimento date not null
);

create table curso
(
	id int auto_increment,
	curso varchar(20) not null,
	nomeCurso varchar(100) null,
	primary key (id, curso),
	constraint curso
		unique (curso)
);

create table disciplina
(
	id int auto_increment,
	disciplina varchar(20) not null,
	nomeDisciplina varchar(200) null,
	primary key (id, disciplina),
	constraint disciplina
		unique (disciplina)
);

create table docente
(
	matriculaDocente int auto_increment
		primary key,
	nomeCompleto varchar(50) null
);

create table login
(
	id int auto_increment
		primary key,
	nome varchar(30) not null,
	tipo varchar(20) null,
	senha varchar(255) null,
	constraint nome
		unique (nome)
);

create table turma
(
	id int auto_increment
		primary key,
	turma varchar(10) not null,
	ano int not null,
	semestre int not null,
	matriculaDocente int not null,
	curso varchar(20) null,
	disciplina varchar(20) null,
	constraint turma_ibfk_1
		foreign key (matriculaDocente) references docente (matriculaDocente),
	constraint turma_ibfk_2
		foreign key (curso) references curso (curso),
	constraint turma_ibfk_3
		foreign key (disciplina) references disciplina (disciplina),
	constraint turma_ibfk_4
		foreign key (matriculaDocente) references docente (matriculaDocente),
	constraint turma_ibfk_5
		foreign key (curso) references curso (curso),
	constraint turma_ibfk_6
		foreign key (disciplina) references disciplina (disciplina),
	constraint turma_ibfk_7
		foreign key (matriculaDocente) references docente (matriculaDocente),
	constraint turma_ibfk_8
		foreign key (curso) references curso (curso),
	constraint turma_ibfk_9
		foreign key (disciplina) references disciplina (disciplina)
);

create table matricula
(
	id int auto_increment
		primary key,
	fk_turma int null,
	aluno int null,
	disciplina varchar(20) null,
	ano int null,
	semestre int null,
	constraint matricula_ibfk_1
		foreign key (aluno) references aluno (id),
	constraint matricula_ibfk_2
		foreign key (fk_turma) references turma (id),
	constraint matricula_ibfk_3
		foreign key (aluno) references aluno (id),
	constraint matricula_ibfk_4
		foreign key (fk_turma) references turma (id),
	constraint matricula_ibfk_5
		foreign key (aluno) references aluno (id),
	constraint matricula_ibfk_6
		foreign key (fk_turma) references turma (id)
);

create index aluno
	on matricula (aluno);

create index fk_turma
	on matricula (fk_turma);

create index curso
	on turma (curso);

create index disciplina
	on turma (disciplina);

create index matriculaDocente
	on turma (matriculaDocente);








INSERT INTO login (id, nome, tipo, senha) VALUES (1, 'ADMIN', 'ADM', '73acd9a5972130b75066c82595a1fae3');
INSERT INTO login (id, nome, tipo, senha) VALUES (5, 'USER123', 'NIVEL1', 'c1b35359b16dcb865ae36ac6096f80fa');
INSERT INTO login (id, nome, tipo, senha) VALUES (6, 'LUIZ.LIMA', 'ADM', 'c1b35359b16dcb865ae36ac6096f80fa');
INSERT INTO login (id, nome, tipo, senha) VALUES (7, 'USER77', 'NIVEL2', 'c1b35359b16dcb865ae36ac6096f80fa');


INSERT INTO docente (matriculaDocente, nomeCompleto) VALUES (100005, 'MARCOS');
INSERT INTO docente (matriculaDocente, nomeCompleto) VALUES (100006, 'ADEMIR');
INSERT INTO docente (matriculaDocente, nomeCompleto) VALUES (100010, 'LUIZ FELIPE');
INSERT INTO docente (matriculaDocente, nomeCompleto) VALUES (100011, 'GUILHERME');
INSERT INTO docente (matriculaDocente, nomeCompleto) VALUES (100012, 'MATHEUS');
INSERT INTO docente (matriculaDocente, nomeCompleto) VALUES (100016, 'PEDRO');
INSERT INTO docente (matriculaDocente, nomeCompleto) VALUES (100020, 'TESTE1');


INSERT INTO disciplina (id, disciplina, nomeDisciplina) VALUES (1, 'ALG', 'ALGORITMOS');
INSERT INTO disciplina (id, disciplina, nomeDisciplina) VALUES (2, 'ENGR2', 'ENGENHARIA DE REQUISITOS II');
INSERT INTO disciplina (id, disciplina, nomeDisciplina) VALUES (3, 'MATC1', 'MATEMATICA COMPUTACIONAL');
INSERT INTO disciplina (id, disciplina, nomeDisciplina) VALUES (8, 'HISTG1', 'HISTORIA GERAL');
INSERT INTO disciplina (id, disciplina, nomeDisciplina) VALUES (9, 'CALC4', 'CALCULO IV');
INSERT INTO disciplina (id, disciplina, nomeDisciplina) VALUES (12, 'NICOLAS_NOVO', 'NICOLAS NOVO');


INSERT INTO curso (id, curso, nomeCurso) VALUES (1, 'ESOFT3S', 'ENGENHARIA DE SOFTWARE');
INSERT INTO curso (id, curso, nomeCurso) VALUES (2, 'ADM', 'ADMINISTRACAO');
INSERT INTO curso (id, curso, nomeCurso) VALUES (3, 'EDUC', 'EDUCAÇÃO FISICA');
INSERT INTO curso (id, curso, nomeCurso) VALUES (4, 'HIST', 'HISTORIA');
INSERT INTO curso (id, curso, nomeCurso) VALUES (22, 'TESTE123', 'TESTE123');


INSERT INTO aluno (id, nomeCompleto, dataNascimento) VALUES (1000000006, 'LUIZ', '1997-02-28');
INSERT INTO aluno (id, nomeCompleto, dataNascimento) VALUES (1000000009, 'JOSE', '2000-10-24');
INSERT INTO aluno (id, nomeCompleto, dataNascimento) VALUES (1000000011, 'HENRIQUE', '1997-02-25');
INSERT INTO aluno (id, nomeCompleto, dataNascimento) VALUES (1000000012, 'PEDRO', '1999-02-10');
INSERT INTO aluno (id, nomeCompleto, dataNascimento) VALUES (1000000014, 'BRUNO', '2000-02-08');


INSERT INTO turma (id, turma, ano, semestre, matriculaDocente, curso, disciplina) VALUES (5, 'EAD_GRAD', 2018, 51, 100016, 'ADM', 'ALG');
INSERT INTO turma (id, turma, ano, semestre, matriculaDocente, curso, disciplina) VALUES (7, 'EAD_GRAD', 2018, 51, 100011, 'ADM', 'CALC4');
INSERT INTO turma (id, turma, ano, semestre, matriculaDocente, curso, disciplina) VALUES (9, 'GRADHS', 2019, 52, 100006, 'EDUC', 'NICOLAS_NOVO');
INSERT INTO turma (id, turma, ano, semestre, matriculaDocente, curso, disciplina) VALUES (22, 'HIST3S4', 2018, 51, 100011, 'HIST', 'HISTG1');
INSERT INTO turma (id, turma, ano, semestre, matriculaDocente, curso, disciplina) VALUES (23, 'TURMA_NICO', 2020, 51, 100010, 'HIST', 'NICOLAS_NOVO');


INSERT INTO matricula (id, fk_turma, aluno, disciplina, ano, semestre) VALUES (1000000015, 9, 1000000011, null, null, null);
INSERT INTO matricula (id, fk_turma, aluno, disciplina, ano, semestre) VALUES (1000000028, 5, 1000000006, null, null, null);
INSERT INTO matricula (id, fk_turma, aluno, disciplina, ano, semestre) VALUES (1000000038, 7, 1000000006, null, null, null);
INSERT INTO matricula (id, fk_turma, aluno, disciplina, ano, semestre) VALUES (1000000041, 9, 1000000009, null, null, null);
INSERT INTO matricula (id, fk_turma, aluno, disciplina, ano, semestre) VALUES (1000000042, 23, 1000000006, 'NICOLAS_NOVO', 2020, 51);