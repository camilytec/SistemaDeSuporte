<?php
include "config/conexao.php";

$id = $_GET['id'];


$stmt = $conn->prepare("SELECT titulo, descricao, status FROM chamados WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$chamado = $result->fetch_assoc();


if (isset($_POST['atualizar'])) {

    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];

    $stmt = $conn->prepare(
        "UPDATE chamados 
         SET titulo = ?, descricao = ?, status = ? 
         WHERE id = ?"
    );

    $stmt->bind_param("sssi", $titulo, $descricao, $status, $id);

    if ($stmt->execute()) {
        header("Location: listar.php");
        exit;
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Editar Chamado</title>

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

    input, textarea, select {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
    }

    input:focus, textarea:focus, select:focus {
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

<h2>Editar Chamado</h2>

<form method="POST">

    <label>Título</label>
    <input type="text" name="titulo" value="<?= $chamado['titulo'] ?>">

    <label>Descrição</label>
    <textarea name="descricao"><?= $chamado['descricao'] ?></textarea>

    <label>Status</label>
    <select name="status">

        <option value="aberto"
        <?php if ($chamado['status'] == 'aberto') echo "selected"; ?>>
        Aberto
        </option>

        <option value="em andamento"
        <?php if ($chamado['status'] == 'em andamento') echo "selected"; ?>>
        Em andamento
        </option>

        <option value="resolvido"
        <?php if ($chamado['status'] == 'resolvido') echo "selected"; ?>>
        Resolvido
        </option>

    </select>

    <button type="submit" name="atualizar">Atualizar</button>

</form>

<a class="voltar" href="listar.php">← Voltar para lista</a>

</div>

</body>
</html>