<?php

// Protege a página: só usuários logados podem listar livros.
include("verificar_sessao.php");

// Inclui a conexão com o banco de dados.
include("conexao.php");

// Consulta SQL que busca todos os livros.
$sql = "SELECT * FROM livros";

// Executa a consulta.
$resultado = mysqli_query($conexao, $sql);

// Verifica se a consulta funcionou.
if (!$resultado) {
    die("Erro ao listar livros: " . mysqli_error($conexao));
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Livros - Biblioteca</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container container-largo">

        <h1>Listagem de Livros</h1>

        <p class="subtitulo">
            Todos os livros cadastrados no sistema.
        </p>

        <table class="tabela-livros">
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>

            <?php while ($livro = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <td>
                        <?php echo htmlspecialchars($livro['id']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($livro['titulo']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($livro['autor']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($livro['status']); ?>
                    </td>

                    <td class="acoes">
                        <a
                            href="editar_livro.php?id=<?php echo urlencode($livro['id']); ?>"
                            class="link-editar">
                            Editar
                        </a>

                        <a
                            href="excluir_livro.php?id=<?php echo urlencode($livro['id']); ?>"
                            class="link-excluir"
                            onclick="return confirm('Tem certeza de que deseja excluir este livro?');">
                            Excluir
                        </a>
                    </td>
                </tr>
            <?php } ?>

        </table>

        <a href="painel.php" class="btn btn-voltar">
            Voltar para o painel
        </a>

    </div>

</body>
</html>