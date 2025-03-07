<?php
include "Header.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if (isset($_GET["msg"])){
    echo "<p style='padding-left: 8px; margin: 0'>". $_GET["msg"] . "</p>";
}
?>

<a href="../../CRUDPOOtoMVC/index.php?action=read" style="padding-left: 8px"><button>Retour</button></a>
    <h3 style="margin: 0; padding-left: 8px">Mise à jour d'un produit</h3>
<form action="../../CRUDPOOtoMVC/index.php?action=sup&id=<?php echo $id ?>" method="post" style="padding: 8px 0 16px 8px">
    <label for="conf">Confirmation :</label>
    <input type="text" id="conf" name="conf" placeholder='Veuillez taper "Supprimer"'/>
    <button type="submit">Envoyer</button>
</form>

<?php include "Footer.php"; ?>