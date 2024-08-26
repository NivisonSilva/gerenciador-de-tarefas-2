<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

include 'db.php';

$user_id = $_SESSION['user_id'];
$name = $_SESSION['name'];
$role = $_SESSION['role'];

$query = "SELECT * FROM tasks WHERE user_id = $user_id";
$tasks = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - MILLENIUM SYSTEM</title>
    <style>
        body {
            background-color: #1a1a3d;
            font-family: Arial, sans-serif;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #333;
            padding: 10px;
            text-align: center;
            position: relative;
        }

        .navbar span {
            color: #fff;
            font-size: 24px;
            font-weight: bold;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            margin-left: 10px;
        }

        .container {
            padding: 20px;
        }

        .task {
            background-color: #444;
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
        }

        .task h3 {
            margin-top: 0;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <span>MILLENIUM SYSTEM</span>
        <a href="logout.php">Sair</a>
    </div>

    <div class="container">
        <h2>Bem-vindo, <?php echo $name; ?>!</h2>
        <p>Função: <?php echo $role; ?></p>

        <h3>Suas Tarefas:</h3>
        <?php while ($task = $tasks->fetch_assoc()) { ?>
            <div class="task">
                <h3><?php echo $task['title']; ?></h3>
                <p><?php echo $task['description']; ?></p>
                <p>Prioridade: <?php echo $task['priority']; ?></p>
            </div>
        <?php } ?>
    </div>

</body>
</html>
