<?php

require_once "Database.php";

class Produit {
    // Propriété privée
    private $pdo;

    // Constructeur
    public function __construct() {
        // Retourne une instance de Database
        $this -> pdo = Database::getInstance() -> getConnection();
    }

    /** Ajout d'un nouveau produit dans la BDD
     * @param string $nom Le nom du produit
     * @param float $prix Le prix
     * @param int $stock La quantité
     * @return boolean true si ajout OK sinon false
     */
    public static function Ajouter($nom, $prix, $stock) {
        // Requête préparée
        $pdo = Database::getInstance() -> getConnection();
        $stmt = $pdo -> prepare("INSERT INTO article (Designation_Article, Prix_unitaire_Article, Quantite_Article) VALUES (?, ?, ?)");
        return $stmt->execute([$nom, $prix, $stock]);
    }

    /** Liste les produits de la BDD
     * @return array Tableau associatif contenant les produits
     */
    public static function Read() {
        // Requête préparée
        $pdo = Database::getInstance() -> getConnection();
        $stmt = $pdo -> query("SELECT * FROM article");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function ReadID($id) {
        // Requête préparée
        $pdo = Database::getInstance() -> getConnection();
        $stmt = $pdo -> query("SELECT * FROM article WHERE Id_Article = $id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function Update($nom, $prix, $stock, $id) {
        // Requête préparée
        $pdo = Database::getInstance() -> getConnection();
        $stmt = $pdo -> prepare("UPDATE article 
                SET Designation_Article = ?, Prix_unitaire_Article = ?, Quantite_Article = ? 
                WHERE Id_Article = $id");
        return $stmt->execute([$nom, $prix, $stock]);
    }

    public static function Sup($id) {
        $pdo = Database::getInstance() -> getConnection();
        $stmt = $pdo -> query("DELETE FROM article WHERE Id_Article = $id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}