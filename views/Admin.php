<?php
session_start();

if (!isset($_SESSION['utilisateur'])){
    header("Location: ../../CRUDPOOtoMVC/views/Login.php");
}

$utilisateur = $_SESSION['utilisateur']
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <h2>Bienvenue <?= htmlspecialchars($utilisateur['prenom']) ?> <?= htmlspecialchars($utilisateur['nom']) ?></h2>
    <a href="../../CRUDPOOtoMVC/index.php?action=read"><button>Voir les produits</button></a>
    <a href="../../CRUDPOOtoMVC/views/Logout.php"><button>Logout</button></a>
</body>
</html>
