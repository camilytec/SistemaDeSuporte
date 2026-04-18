 <?php
include "config\conexao.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM chamados WHERE id=?");
    $stmt->bind_param("i", $id);

    if($stmt->execute()){
        header("Location:listar.php");
        exit;
    }else{
        echo "Erro ao deletar: " . $conn->$error;
    }
}
?>