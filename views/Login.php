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
    <title>Login</title>
</head>
<body>
    <?php
        if (isset($_SESSION['error'])){
            echo "<p style='color: red'>" . $_SESSION['error'] . "</p>";
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['msg'])){
            echo "<p style='color: red'>" . $_SESSION['msg'] . "</p>";
            unset($_SESSION['msg']);
        }
    ?>
    <a href="../../CRUDPOOtoMVC/index.php" style="padding-left: 8px"><button>Retour</button></a>
    <h1>Login</h1>
    <form method="post" action="../../CRUDPOOtoMVC/index.php?action=login">
        <label for="mail">Email :</label>
        <input type="email" id="mail" name="mail" required placeholder="Entrez votre adresse email"/>

        <label for="mdp">Mot de passe :</label>
        <input type="password" id="mdp" name="mdp" required placeholder="Entrez votre mot de passe"/>

        <button type="submit">Envoyer</button>
    </form>

    <a href="../../CRUDPOOtoMVC/views/Register.php"><button>Pas encore inscrit ?</button></a>
</body>
</html>
