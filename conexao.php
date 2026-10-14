<?php

$conexao = mysqli_query(
    "localhost",
    "root",
    "root",
    "biblioteca"
);
if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_errno());
}
