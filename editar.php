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

<h2>Editar chamado</h2>

<form method="POST">

    Título:<br>
    <input type="text" name="titulo" value="<?= $chamado['titulo'] ?>"><br><br>

    Descrição:<br>
    <textarea name="descricao"><?= $chamado['descricao'] ?></textarea><br><br>

    Status:<br>
    <select name="status">

        <option value="aberto"
        <?php
        if ($chamado['status'] == 'aberto') {
            echo "selected";
        }
        ?>>
        Aberto
        </option>

        <option value="em andamento"
        <?php
        if ($chamado['status'] == 'em andamento') {
            echo "selected";
        }
        ?>>
        Em andamento
        </option>

        <option value="resolvido"
        <?php
        if ($chamado['status'] == 'resolvido') {
            echo "selected";
        }
        ?>>
        Resolvido
        </option>

    </select><br><br>

    <button type="submit" name="atualizar">Atualizar</button>

</form>