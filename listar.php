<?php
include "config/conexao.php";
$sql = "SELECT * FROM CHAMADOS";
$result = $conn->query($sql);
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        echo "ID: ". $row["id"] . "<br>";
        echo "Título: ". $row["titulo"] . "<br>";
        echo "Descrição: ". $row["descricao"] . "<br>";
        echo "Status: ". $row["status"] . "<br>";
    }
}
else{
    echo "Não foi encontrado nenhum chamado!";
}

?>