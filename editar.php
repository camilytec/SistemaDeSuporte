<?php
include "config/conexao.php";

$id = $_GET['id'];

$sql = "SELECT * FROM chamados WHERE id = $id";
$result = $conn->query($sql);
$chamado = $result->fetch_assoc();

if (isset($_POST['atualizar'])) {

    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];

    $sql = "UPDATE chamados
            SET titulo='$titulo', descricao='$descricao', status='$status'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: listar.php");
        exit;
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<h2>Editar chamado</h2>

<form method="POST">

    Título:<br>
    <input type="text" name="titulo" value="<?= $chamado['titulo'] ?>"><br><br>

    Descrição:<br>
    <textarea name="descricao"><?= $chamado['descricao'] ?></textarea><br><br>

    Status:<br>
    <select name="status">

        <option value="aberto"
        <?= $chamado['status'] == 'aberto' ? 'selected' : '' ?>>
        Aberto
        </option>

        <option value="em andamento"
        <?= $chamado['status'] == 'em andamento' ? 'selected' : '' ?>>
        Em andamento
        </option>

        <option value="resolvido"
        <?= $chamado['status'] == 'resolvido' ? 'selected' : '' ?>>
        Resolvido
        </option>

    </select><br><br>

    <button type="submit" name="atualizar">Atualizar</button>

</form>