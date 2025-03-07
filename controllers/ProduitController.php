<?php
require_once __DIR__ . "/../models/Produit.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
class ProduitController {
    public function read() {
        $article =  Produit::Read();

        include __DIR__ . "/../views/ProduitsView.php";
    }

    public function add() {
        $article = Produit::Ajouter($_POST["name"], $_POST["prix"], $_POST["quantite"]);
        header("Location: index.php?action=read");
        exit();
    }

    public function modif() {
        $article = Produit::ReadID($_GET['id']);
        if (empty($article)) {
            $_SESSION["Message"] = "Article introuvable !";
            header("Location: index.php");
            exit();
        }
        $name = !empty($_POST["name"]) ? trim($_POST["name"]) : $article[0]["Designation_Article"];
        $prix = !empty($_POST["prix"]) ? floatval($_POST["prix"]) : floatval($article[0]["Prix_unitaire_Article"]);
        $quantite = !empty($_POST["quantite"]) ? intval($_POST["quantite"]) : intval($article[0]["Quantite_Article"]);

        $article = Produit::Update($name, $prix, $quantite, $_GET['id']);
        header("Location: index.php?action=read");
        exit();
    }

    public function sup() {
        $article = Produit::ReadID($_GET['id']);
        if (empty($article)) {
            $_SESSION["Message"] = "Article introuvable !";
            header("Location: index.php");
            exit();
        }

        if ($_POST["conf"] === "Supprimer"){
            $article = Produit::Sup($_GET['id']);
            header("Location: index.php?action=read");
            exit();
        } else {
            header("Location: views/Sup.php?msg=Confirmation ratee : Mauvaise orthographe&id=" . $_GET['id']);
            exit();
        }
    }
}