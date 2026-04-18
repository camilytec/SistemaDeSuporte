<?php
include "config/conexao.php";
include "header.php";

if (isset($_POST['enviar'])) {

    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $status = "aberto";

    $stmt = $conn->prepare(
        "INSERT INTO chamados (titulo, descricao, status) VALUES (?, ?, ?)"
    );

    $stmt->bind_param("sss", $titulo, $descricao, $status);

    if ($stmt->execute()) {
        echo "<p style='color: green; text-align:center;'>Chamado criado com sucesso!</p>";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Novo Chamado</title>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f6f8;
        margin: 0;
    }

    .container {
        width: 500px;
        margin: 80px auto;
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    h2 {
        text-align: center;
        color: #341539;
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        color: #341539;
    }

    input, textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
    }

    input:focus, textarea:focus {
        border-color: #982aa8;
    }

    button {
        width: 100%;
        padding: 12px;
        background: #982aa8;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background: #341539;
    }

    .voltar {
        display: block;
        text-align: center;
        margin-top: 15px;
        text-decoration: none;
        color: #982aa8;
    }

    .voltar:hover {
        text-decoration: underline;
    }

</style>

</head>

<body>

<div class="container">

<h2>Novo Chamado</h2>

<form method="POST">

    <label>Título</label>
    <input type="text" name="titulo" required>

    <label>Descrição</label>
    <textarea name="descricao" rows="5" required></textarea>

    <button type="submit" name="enviar">Criar Chamado</button>

</form>

<a class="voltar" href="index.php">← Voltar ao menu</a>

</div>

</body>
</html>