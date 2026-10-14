<?php
// Recebe os dados do formulário de cadastro e selva o usuário no banco.
// Conceitos: POSt, password_hash, MySQL, INSERT, verificação de E-mal duplicado.

include('conexao.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

// ==============================================
// VERIFICAÇÃO DE EMAIL DUPLICADO
// ==============================================

$sqlVerificar = "SELECT id FROM usuarios WHERE email = '$email'";

$resultadoVerificar = mysqli_query($conexao, $sqlVerificar);

if(mysqli_num_rows($resultadoVerificar) > 0) {
    header("Location: cadastro.php?erro=email");
    exit();
}

// ================================================
// CRIPTOGRAFIA DA SENHA
// Nunca armazenamos a senha em texto puro no banco
// ================================================
$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

// ==============================================
// INSERÇÃO NO BANCO (CREAT DO CRUD)
// ==============================================

$sql = "INSERT INTO usuarios (nome, email, senha) Values ('$nome', '$email', '$senhaCriptografada')";

mysqli_query($conexao, $sql);

header("Location: login.php");
exit();
