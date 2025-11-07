<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM carros WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        die("Carro não encontrado.");
    }

    $carro = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $modelo = $_POST['modelo'];
        $ano = intval($_POST['ano']);

        $sql = "UPDATE carros SET modelo='$modelo', ano=$ano WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            header('Location: index.php');
            exit;
        } else {
            echo "Erro ao atualizar: " . $conn->error;
        }
    }
} else {
    die("ID não fornecido.");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Editar Carro</title>
</head>
<body>
<h1>Editar Carro</h1>
<form method="POST">
    Modelo: <input type="text" name="modelo" value="<?php echo $carro['modelo']; ?>" required><br>
    Ano: <input type="number" name="ano" value="<?php echo $carro['ano']; ?>" required><br>
    <input type="submit" value="Salvar Alterações">
</form>
<a href="index.php">Cancelar</a>
</body>
</html>
