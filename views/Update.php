<?php
include "Header.php";
require_once __DIR__ . "/../models/Produit.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$article = Produit::ReadID($id)[0];
?>

<a href="../../CRUDPOOtoMVC/index.php"><button>Retour</button></a>
<form action="../../CRUDPOOtoMVC/index.php?action=modif&id=<?php echo $id ?>" method="post">
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" placeholder="Entrez le nom" value="<?php echo $article["Designation_Article"] ?>"/>
    <label for="prix">Prix :</label>
    <input type="text" id="prix" name="prix" placeholder="Entrez le prix" value="<?php echo $article["Prix_unitaire_Article"] ?>"/>
    <label for="quantite">Quantité :</label>
    <input type="text" id="quantite" name="quantite" placeholder="Entrez la quantité" value="<?php echo $article["Quantite_Article"] ?>"/>
    <button type="submit">Envoyer</button>
</form>

<?php include "Footer.php"; ?>