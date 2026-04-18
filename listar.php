<?php
include "config/conexao.php";

$sql = "SELECT * FROM chamados";
$result = $conn->query($sql);
?>

<h2>Lista de Chamados</h2>

<table border="1">
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
                <a href="editar.php?id=<?= $row['id'] ?>">Editar</a> |
                <a href="deletar.php?id=<?= $row['id'] ?>">Excluir</a>
            </td>
        </tr>
<?php
    }
} else {
    echo "<tr><td colspan='5'>Nenhum chamado encontrado</td></tr>";
}
?>

</table>