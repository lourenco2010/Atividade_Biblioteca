<?php

// atualizar_livro.php
// recebe os dados do formulário de atualização de livro e atualiza o registro no banco de dados
// conceitos: POST, MySQL, UPDATE (U DO CRUD)

// Protege a página: só usuários logados podem atualizar livros
include("verificar_sessão.php");

//inclui conexão com o banco de dados
include("conexao.php");

// Recebe os dados enviados pelo formulário via POST
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$status = $_POST['status'];

// Monta o comando SQL UPDATE para alterar os dados do livro
$sql = "UPDATE livros SET titulo = '$titulo', autor = '$autor', status = '$status' WHERE id = $id";

// Executa o update no banco de dados
mysqli_query($conexao, $sql);

// Redireciona para a página de listagem de livros após a atualização
header("Location: listar_livro.php");
exit();

