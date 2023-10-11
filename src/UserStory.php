<?php

use App\Validateur;

class UserStory {

    public function execute(string $login, string $password) {
        $validateur = new Validateur();
        try {
            $validateur->checkPassword2($password);
            echo "Le mot de passe est valide.";
        } catch (\App\Exceptions\PasswordException $e) {
            echo $e->getMessage();
        }
    }
}