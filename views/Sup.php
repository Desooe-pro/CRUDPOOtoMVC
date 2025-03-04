<?php
include "Header.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if (isset($_GET["msg"])){
    echo $_GET["msg"] . "<br>";
}
?>

<a href="../../CRUDPOOtoMVC/index.php"><button>Retour</button></a>
<form action="../../CRUDPOOtoMVC/index.php?action=sup&id=<?php echo $id ?>" method="post">
    <label for="conf">Confirmation :</label>
    <input type="text" id="conf" name="conf" placeholder='Veuillez taper "Supprimer"'/>
    <button type="submit">Envoyer</button>
</form>

<?php include "Footer.php"; ?>