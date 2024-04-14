<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la tâche</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .task-details {
            margin-bottom: 20px;
        }

        .task-details h2 {
            margin-bottom: 10px;
            color: #333;
        }

        .task-details p {
            margin: 5px 0;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Détails de la tâche</h1>
        <div class="task-details">
            <h2>Nom de la tâche :</h2>
            <p><?= $task['name'] ?></p>
            <h2>Description :</h2>
            <p><?= $task['description'] ?></p>
            <h2>Date d'échéance :</h2>
            <p><?= $task['due_date'] ?></p>
            <h2>Priorité :</h2>
            <p><?= $task['priority'] ?></p>
            <h2>Statut :</h2>
            <p><?= $task['status_name'] ?></p>
            <h2>Assigné à :</h2>
            <p><?= $task['assigned_to_username'] ?></p>
        </div>
        <a href="tasks.php" class="back-link">Retourner à la liste des tâches</a>
    </div>
</body>

</html>
