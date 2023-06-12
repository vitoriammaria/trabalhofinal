<!DOCTYPE html>
<html>
<head>
    <title>Atualizar Compromisso</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }
        
        h1 {
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="tel"] {
            padding: 5px;
            width: 200px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
    include 'db.php';
    if (!isset($_GET['id'])) {
        header('Location: estoque.php');
        exit;
    }
    $id = $_GET['id'];

    $stmt = $conn->prepare('SELECT * FROM estoque WHERE id = ?');
    $stmt->execute([$id]);
    $appointment = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$appointment) {
        header('Location: estoque.php');
        exit;
    }
    $peca = $appointment['peca'];
    $tamanho = $appointment['tamanho'];
    $preco = $appointment['preco'];
    $estoqueatual = $appointment['estoqueatual'];
    $estoqueminimo = $appointment['estoqueminimo'];
    ?>

    <h1>Atualizar Compromisso</h1>
    <form method="post">
        <label for="peca">Peça:</label>
        <input type="text" name="peca" value="<?php echo $peca; ?>" required><br>

        <label for="tamanho">Tamanho: </label>
        <input type="text" name="tamanho" value="<?php echo $tamanho; ?>" required><br>

        <label for="preco">Preço:</label>
        <input type="text" name="preco" value="<?php echo $preco; ?>" required><br>

        <label for="estoqueatual">Estoque Atual:</label>
        <input type="text" name="estoqueatual" value="<?php echo $estoqueatual; ?>" required><br>

        <label for="estoqueminimo">Estoque Mínimo:</label>
        <input type="text" name="estoqueminimo" value="<?php echo $estoqueminimo; ?>" required><br>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $peca = $_POST['peca'];
    $tamanho = $_POST['tamanho'];
    $preco = $_POST['preco'];
    $estoqueatual = $_POST['estoqueatual'];
    $estoqueminimo = $_POST['estoqueminimo'];

    // validação dos dados do formulário aqui
    $stmt = $conn->prepare('UPDATE estoque SET peca = ?, tamanho = ?, preco = ?, estoqueatual = ?, estoqueminimo = ? WHERE id= ?');
    $stmt->execute([$peca, $tamanho, $preco, $estoqueatual, $estoqueminimo, $id]);
    header('Location: estoque.php');
    exit;
}
?>