<?php

use JetBrains\PhpStorm\NoReturn;

require_once "Database.php";

class Log {
    public static function checkMail($mail) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare('SELECT * FROM utilisateur WHERE email = ?');
        $stmt->execute([$mail]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    #[NoReturn] public static function Register($nom, $prenom, $mail, $mdp) : void {
        $hash = password_hash($mdp, PASSWORD_BCRYPT, ['cost' => 10]);
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("INSERT INTO utilisateur (nom, prenom, email, mdp) VALUES (?, ?, ?, ?)");
        if ($stmt->execute([$nom, $prenom, $mail, $hash])){
            $_SESSION['msg'] = 'Inscription réussie';
            header("Location: ../../CRUDPOOtoMVC/views/Login.php");
        } else {
            $_SESSION['error'] = 'Inscription ratée';
            header("Location: ../../CRUDPOOtoMVC/views/Register.php");
        }
        exit();
    }
}