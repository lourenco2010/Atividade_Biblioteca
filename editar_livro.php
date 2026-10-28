<?php

// editar_livro.php
// exibi o formulário preenchido com os dados do livro para edição
// Conceitos: $_GET, MySQL, SELECT, Formulário de edição.

// Protege a página: só usuários logados podem editar livros
include("verificar_sessao.php");

// Conecta ao banco de dados
include("conexao.php");

// Recebe o ID do livro pela URL (ex: editar_livro.php?id=3)
$id = $_GET['id'];

// Consulta SQL para buscar os dados do livro pelo ID
$sql = "SELECT * FROM livros WHERE id = $id";

// Executa a consulta
$resultado = mysqli_query($conexao, $sql);

// Transforma o resultado em um array associativo
$livro = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro - Biblioteca</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Editar Livro</h1>
        <p class="subtitulo">
            altere os dados do livro e clique em atualizar.
        </p>

        <!--- Formulário envia os dados para atualizar_livro.php -->
        <form action="atualizar_livro.php" method="POST">
            <!-- Campo oculto para enviar o ID do livro -->
            <input type="hidden" name="id" value="<?php echo $livro['id']; ?>">
            <div>
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" value="<?php echo htmlspecialchars($livro['titulo']); ?>"
                    required>
            </div>
            <div>
                <label for="autor">Autor:</label>
                <input type="text" name="autor" id="autor" value="<?php echo htmlspecialchars($livro['autor']); ?>"
                    required>
            </div>
            <div>
                <label for="status">Status:</label>
                <select name="status" id="status" required>
                    <option value="disponivel" <?php echo ($livro['status'] === 'disponivel') ? 'selected' : ''; ?>>
                        Disponível
                    </option>
                    <option value="emprestado" <?php echo ($livro['status'] === 'emprestado') ? 'selected' : ''; ?>>
                        Emprestado
                    </option>
                </select>
            </div>
            <button type="submit" class="btn btn-block">Atualizar Livro</button>
        </form>
        <a href="listar_livro.php" class="btn btn-voltar">Voltar para a listagem de livros.</a>

    </div>



</body>

</html>