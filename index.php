<?php
session_start();

require_once "controllers/ProduitController.php";
require_once "controllers/LogController.php";

$action = $_GET['action'] ?? 'base';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if (isset($_SESSION['utilisateur']) && $action === "base"){
    $action = "connected";
}

$controller = new ProduitController();

switch ($action){
    case "base" :
        Controller::base();
        break;
    case "connected" :
        header("Location: ../../CRUDPOOtoMVC/views/Admin.php");
        break;
    case "read" :
        if (!isset($_SESSION['utilisateur'])){
            session_destroy();
            header("Location: ../../CRUDPOOtoMVC/views/Login.php");
            break;
        }
        // Appel de la méthode pour afficher les détails de la voiture
        $controller->read();
        break;
    case "add" :
        if (!isset($_SESSION['utilisateur'])){
            header("Location: ../../CRUDPOOtoMVC/views/Login.php");
        }
        // Appel de la méthode pour réparer la voiture
        $controller->add();
        break;
    case "modif" :
        if (!isset($_SESSION['utilisateur'])){
            header("Location: ../../CRUDPOOtoMVC/views/Login.php");
        }
        // Appel de la fonction pour constater la panne
        $controller->modif();
        break;
    case "sup" :
        if (!isset($_SESSION['utilisateur'])){
            header("Location: ../../CRUDPOOtoMVC/views/Login.php");
        }
        $controller->sup();
        break;
    case "register" :
        Controller::register();
        break;
    case "login" :
        Controller::login();
        break;
    default :
        // Si l'action n'existe pas
        echo "Action non éxistante";
}