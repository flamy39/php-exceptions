<?php

namespace App\UserStories;

use App\Exceptions\PasswordException;
use App\Validateur\Validateur;

class CreerUtilisateurUS
{

    private Validateur $validateur;

    public function __construct(Validateur $validateur)
    {
        $this->validateur = $validateur;
    }

    public function execute(string $login, string $password) : bool
    {
        $this->validateur->verifierMotPasse($password);
        return true;
    }
}