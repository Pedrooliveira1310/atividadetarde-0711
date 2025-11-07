<?php
include 'conexao.php';

// Criar tabela se não existir
$sql = "CREATE TABLE IF NOT EXISTS carros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modelo VARCHAR(255),
    ano INT
)";
$conn->query($sql);

// Inserção
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modelo = trim($_POST["modelo"]);
    $ano = intval($_POST["ano"]);

    if ($modelo == "" || $ano <= 0) {
        echo "<p class='error'>Preencha os campos corretamente.</p>";
    } else {
        $sqlInsert = "INSERT INTO carros (modelo, ano) VALUES ('$modelo', $ano)";
        if ($conn->query($sqlInsert) === TRUE) {
            echo "<p class='success'>Carro inserido com sucesso!</p>";
        } else {
            echo "<p class='error'>Erro ao inserir: " . $conn->error . "</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Cadastro de Carros - Chevrolet</title>
<style>
    body { font-family: 'Segoe UI'; background: linear-gradient(180deg, #002c5f, #004b8d); color: #fff; text-align: center; }

    h1, h3 { color: #ffd700; }

    form, table { margin: 20px auto; }

    input, button { padding: 8px; margin: 5px; border-radius: 5px; border: none; }

    input[type="submit"] { background: #ffd700; color: #002c5f; font-weight: bold; cursor: pointer; }

    table { border-collapse: collapse; width: 70%; background: rgba(255,255,255,0.1); }

    th, td { padding: 10px; border-bottom: 1px solid rgba(255,255,255,0.2); }

    th { background: #ffd700; color: #002c5f; }

    a { color: #ffd700; text-decoration: none; }

    a:hover { text-decoration: underline; }

    .success { color: #00ff88; }

    .error { color: #ff6666; }
    


</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<h1>Cadastro de Carros da Chevrolet</h1>

<form method="POST">
    <input type="text" name="modelo" placeholder="Modelo" required>
    <input type="number" name="ano" placeholder="Ano" required>
    <input type="submit" value="Cadastrar">
</form>

<h3>Carros cadastrados</h3>
<?php
$sqlAll = "SELECT * FROM carros";
$result = $conn->query($sqlAll);

if ($result->num_rows > 0) {
    echo "<table>
            <tr><th>ID</th><th>Modelo</th><th>Ano</th><th>Ações</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['modelo']}</td>
                <td>{$row['ano']}</td>
                <td>
                    <a href='update.php?id={$row['id']}'>Editar</a> |
                    <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Tem certeza que deseja deletar?\")'>Excluir</a>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum carro cadastrado.<br>";
}

// Contagem
$sqlCount = "SELECT COUNT(*) AS total FROM carros";
$resCount = $conn->query($sqlCount);
$linhaCount = $resCount->fetch_assoc();
echo "<p>Total de carros: {$linhaCount['total']}</p>";

$conn->close();
?>
</body>
</html>
