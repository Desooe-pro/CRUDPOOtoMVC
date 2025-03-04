<?php

session_start();

require_once "controllers/ProduitController.php";

$action = isset($_GET['action']) ? $_GET['action'] : 'read';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$controller = new ProduitController();

switch ($action){
    case "read" :
        // Appel de la méthode pour afficher les détails de la voiture
        $controller->read();
        break;
    case "add" :
        // Appel de la méthode pour réparer la voiture
        $controller->add();
        break;
    case "modif" :
        // Appel de la fonction pour constater la panne
        $controller->modif();
        break;
    case "sup" :
        $controller->sup();
        break;
    default :
        // Si l'action n'existe pas
        echo "Action non éxistante";
}