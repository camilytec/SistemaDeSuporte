<?php
include "config/conexao.php";
include "header.php";

$sql = "SELECT * FROM chamados";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Lista de Chamados</title>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f6f8;
        margin: 0;
    }

    .container {
        width: 90%;
        margin: 40px auto;
    }

    h2 {
        text-align: center;
        color: #341539;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    th {
        background: #341539;
        color: white;
        padding: 12px;
        text-align: left;
    }

    td {
        padding: 12px;
        border-bottom: 1px solid #eee;
    }

    tr:hover {
        background: #f3e6f6;
    }

    a {
        text-decoration: none;
        padding: 6px 10px;
        border-radius: 5px;
        font-size: 14px;
    }

    .edit {
        background: #982aa8;
        color: white;
    }

    .delete {
        background: #982aa8;
        color: white;
    }

    .edit:hover {
        opacity: 0.8;
    }

    .delete:hover {
        opacity: 0.8;
    }

    .empty {
        text-align: center;
        padding: 20px;
        color: #777;
    }

</style>

</head>

<body>

<div class="container">

<h2>Lista de Chamados</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Descrição</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>

<?php
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['titulo'] ?></td>
        <td><?= $row['descricao'] ?></td>
        <td><?= $row['status'] ?></td>
        <td>
            <a class="edit" href="editar.php?id=<?= $row['id'] ?>">Editar</a>
            <a class="delete" href="deletar.php?id=<?= $row['id'] ?>">Excluir</a>
        </td>
    </tr>
<?php
    }
} else {
    echo "<tr><td colspan='5' class='empty'>Nenhum chamado encontrado</td></tr>";
}
?>

</table>

</div>

</body>
</html>