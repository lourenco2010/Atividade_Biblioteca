<?php
 
// Protege a página: só usuários logados podem salvar livros.
include("verificar_sessao.php");
 
// Incluir a conexão com o banco de dados (MySQL)
include("conexao.php");
 
// Recebe os dados enviados pelo formulário via POST
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$status = $_POST['status'];
 
// Monta o comando SQL INSERT para cadastrar o livro:
$sql = "INSERT INTO livros (titulo, autor, status) VALUES ('$titulo', '$autor', '$status')";
 
// Executa o INSERT no bando de dados
mysqli_query($conexao, $sql);
 
// Redireciona para listagem de livros após salvar
header("Location: listar_livro.php");
exit();