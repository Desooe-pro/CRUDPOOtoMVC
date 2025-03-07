<?php include "Header.php"?>
    <a href="../../CRUDPOOtoMVC/index.php" style="padding-left: 8px"><button>Retour</button></a>
    <h3 style="margin: 0; padding-left: 8px">Ajouter un produit</h3>
    <form action="../../CRUDPOOtoMVC/index.php?action=add" method="post" style="padding: 8px 0 16px 8px">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" required placeholder="Entrez le nom"/>
        <label for="prix">Prix :</label>
        <input type="text" id="prix" name="prix" required placeholder="Entrez le prix"/>
        <label for="quantite">Quantité :</label>
        <input type="text" id="quantite" name="quantite" required placeholder="Entrez la quantité"/>
        <button type="submit">Envoyer</button>
    </form>
<?php if(!empty($article)): ?>
    <h2 style="text-align: center; margin-top: 0">Liste des produits</h2>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Stock</th>
            <th>Modification</th>
            <th>Suppression</th>
        </tr>
        </thead>
        <tbody>
        <!-- PHP -->
        <?php foreach($article as $a):  ?>
            <tr>
                <td><?= htmlspecialchars($a['Id_Article']) ?></td>
                <td><?= htmlspecialchars($a['Designation_Article']) ?></td>
                <td><?= htmlspecialchars($a['Prix_unitaire_Article']) ?></td>
                <td><?= htmlspecialchars($a['Quantite_Article']) ?></td>
                <td><a href="/views/Update.php?id=<?= htmlspecialchars($a['Id_Article']) ?>">Modifier</a></td>
                <td><a href="/views/Sup.php?id=<?= htmlspecialchars($a['Id_Article']) ?>">Supprimer</a></td>
            </tr>
        <?php endforeach;  ?>
        </tbody>
    </table>
<?php else:  ?>
    <p>Aucun auteur</p>
<?php endif; ?>

<?php include "Footer.php"; ?>