<!DOCTYPE html>
<html>
<head>
    <title>Deletar produto</title>
    <style>
           body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }s
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
        }

        p {
            color: #555;
        }

        form {
            margin-top: 20px;
        }

        button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            cursor: pointer;
        }

        a {
            color: #333;
            text-decoration: none;
            margin-left: 10px;
        }
    </style>
</head>
<body>
<?php
include 'db.php';

if (!isset($_GET['id'])) {
    header('location: estoque.php');
    exit;
}

$id = $_GET['id'];
$stmt = $conn->prepare('SELECT * FROM estoque WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('location: estoque.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conn->prepare('DELETE FROM estoque WHERE id = ?');
    $stmt->execute([$id]);
    header('location: estoque.php');
    exit;
}
?>

<h1>Deletar produto</h1>
<p>Tem certeza de que deseja deletar o produto <?php echo $appointment['peca']; ?>?</p>
<form method="post">
    <button type="submit">Sim</button>
    <a href="estoque.php">Não</a>
</form>
</body>
</html>