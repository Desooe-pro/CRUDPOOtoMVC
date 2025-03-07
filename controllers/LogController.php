<?php

require_once __DIR__ . "/../models/Log.php";

class Controller {
    public static function base() : void {
        include __DIR__ . "/../views/Home.php";
    }

    public static function register() : void {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $nom = isset($_POST['nom']) ? trim($_POST['nom']) : "";
            $prenom = isset($_POST['prenom']) ? trim($_POST['prenom']) : "";
            $mail = isset($_POST['mail']) ? trim($_POST['mail']) : "";
            $mdp = isset($_POST['mdp']) ? trim($_POST['mdp']) : "";

            if (!empty($nom) && !empty($mdp) && filter_var($mail, FILTER_VALIDATE_EMAIL)){
                $stmt = Log::checkMail($mail);

                if ($stmt){
                    $_SESSION['error'] = "Désolé cet email existe déjà";
                } else {
                    Log::Register($nom, $prenom, $mail, $mdp);
                }
            } else {
                $_SESSION['error'] = "Veuillez remplir correctement les champs";
            }
        }
    }

    public static function login() : void {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $mail = isset($_POST['mail']) ? trim($_POST['mail']) : "";
            $mdp = isset($_POST['mdp']) ? trim($_POST['mdp']) : "";

            if (filter_var($mail, FILTER_VALIDATE_EMAIL) && !empty($mdp)){
                $utilisateur = Log::checkMail($mail);
                $PWValid = password_verify($mdp, $utilisateur['mdp']);

                if ($utilisateur && $PWValid){
                    $_SESSION['utilisateur'] = $utilisateur;
                    header("Location: index.php");
                } else {
                    $_SESSION["error"] = "Email ou mot de passe incorrect";
                    header("Location: ../../CRUDPOOtoMVC/views/Login.php");
                }
                exit();
            }
        }
    }
}