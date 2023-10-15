<?php


use App\Exceptions\PasswordException;
use App\UserStories\CreerUtilisateurUS;
use App\Validateur\Validateur;

require_once "./vendor/autoload.php";

// Créer un objet Validateur
$creerUtilisateurUS = new CreerUtilisateurUS(new Validateur());
try {
  $creerUtilisateurUS->execute("login", "PassePasse12");
} catch (PasswordException $e) {
    echo $e->getMessage();
}

