<?php
session_start();

if (isset($_SESSION['utilisateur'])){
    header("location: Admin.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <?php
        if (isset($_SESSION['error'])){
            echo "<p style='color: red'>" . $_SESSION['error'] . "</p>";
            unset($_SESSION['error']);
        }
    ?>
    <a href="../../CRUDPOOtoMVC/index.php" style="padding-left: 8px"><button>Retour</button></a>
    <h1>Register</h1>
    <form method="post" action="../../CRUDPOOtoMVC/index.php?action=register">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required placeholder="Entrez votre nom"/>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required placeholder="Entrez votre prénom"/>

        <label for="mail">Email :</label>
        <input type="email" id="mail" name="mail" required placeholder="Entrez votre adresse email"/>

        <label for="mdp">Mot de passe :</label>
        <input type="password" id="mdp" name="mdp" required placeholder="Entrez votre mot de passe"/>

        <button type="submit">Envoyer</button>
    </form>

    <a href="../../CRUDPOOtoMVC/views/Login.php"><button>Déja inscrit ?</button></a>
</body>
</html>
