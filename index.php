<?php

require_once "./vendor/autoload.php";

// Créer un objet Validateur
$validateur = new App\Validateur();
try {
  $validateur->checkPassword2("passepasse");
  echo "Le mot de passe est valide.";
} catch (\App\Exceptions\PasswordException $e) {
    echo $e->getMessage();
}