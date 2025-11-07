<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM carros WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
        exit;
    } else {
        echo "Erro ao deletar: " . $conn->error;
    }
} else {
    echo "ID não fornecido.";
}
?>
