<?php
include "config/conexao.php";

if (isset($_POST['enviar'])) {

    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];

    $sql = "INSERT INTO chamados (titulo, descricao, status)
            VALUES ('$titulo', '$descricao', 'aberto')";

    if ($conn->query($sql) === TRUE) {
        echo "Chamado criado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<form method="POST">
    <h2>Novo Chamado</h2>

    Título: <br>
    <input type="text" name="titulo"><br><br>

    Descrição: <br>
    <textarea name="descricao"></textarea><br><br>

    <button type="submit" name="enviar">Criar Chamado</button>
</form>