<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Controle de Estoque</title>
</head>
<body>
<?php
require_once 'db.php';
?>

<?php
// Processar o formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $peca = $_POST["peca"];
    $tamanho = $_POST["tamanho"];
    $preco = $_POST["preco"];
    $estoqueatual = $_POST["estoqueatual"];
    $estoqueminimo = $_POST["estoqueminimo"];

    // Preparar a consulta SQL
    $stmt = $conn->prepare("INSERT INTO estoque (peca, tamanho, preco, estoqueatual, estoqueminimo) 
    VALUES (?, ?, ?, ?, ?)");

    // Vincular os parâmetros
    $stmt->bindParam(1, $peca);
    $stmt->bindParam(2, $tamanho);
    $stmt->bindParam(3, $preco);
    $stmt->bindParam(4, $estoqueatual);
    $stmt->bindParam(5, $estoqueminimo);

    // Executar a consulta
    if ($stmt->execute()) {
        echo "Produto adicionado com sucesso!";
    } else {
        echo "Erro ao adicionar o produto: " . $stmt->errorInfo()[2];
    }
}

// Selecionar os produtos do estoque
$sql = "SELECT * FROM estoque";
$result = $conn->query($sql);
?>

<h2>Controle de Estoque</h2>

<h3>Adicionar Produto</h3>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label for="peca">Peça:</label>
    <input type="text" id="peca" name="peca" required><br><br>

    <label for="tamanho">Tamanho:</label>
    <input type="text" id="tamanho" name="tamanho" required><br><br>

    <label for="preco">Preço:</label>
    <input type="number" id="preco" name="preco" required><br><br>

    <label for="estoqueatual">Estoque Atual:</label>
    <input type="number" id="estoqueatual" name="estoqueatual" required><br><br>

    <label for="estoqueminimo">Estoque Minimo:</label>
    <input type="number" id="estoqueminimo" name="estoqueminimo" required><br><br>

    <input type="submit" value="Adicionar Produto">
</form>

<h3>Produtos no Estoque</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Peça</th>
        <th>Tamanho</th>
        <th>Preço</th>
        <th>Estoque Atual</th>
        <th>Estoque Minimo</th>
        <th colspan="2">Opções</th>
        <th colspan="3">Status adicionais</th>
    </tr>
    <?php
    // Exibir os produtos do estoque
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["peca"] . "</td>";
            echo "<td>" . $row["tamanho"] . "</td>";
            echo "<td>" . $row["preco"] . "</td>";
            echo "<td>" . $row["estoqueatual"] . "</td>";
            echo "<td>" . $row["estoqueminimo"] . "</td>";
            echo '<td><a style="color:black;" href="atualizar.php?id='.$row['id'] . '">Atualizar</a></td>';
            echo '<td><a style="color:black;" href="deletar.php?id='.$row['id'] .'">Deletar</a></td>';
          
            if($row["estoqueatual"] == 0) {
                    echo "<td colspan='3'><p style='color: red;'>Nenhum produto no estoque</p></td>";
            } else {
                if ($row["estoqueatual"] < $row["estoqueminimo"]) {
                    echo "<td colspan='3'><p style='color: red;'>Aviso: Estoque atual esta abaixo do estoque mínimo!</p></td>";
                } 
            }

            echo "</tr>"; 
        }
    } 

    ?>
</table>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Controle de Estoque</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        h3 {
            color: #666;
            margin-bottom: 10px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 200px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #5d8aa8;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #5d8aa8;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .warning {
            color: red;
        }
    </style>
</head>
<body>
<!-- Resto do código HTML -->
</body>
</html>