<?php

namespace App\Validateur;

use App\Exceptions\NombreException;
use App\Exceptions\PasswordException;

class Validateur
{
    /**
     * @throws NombreException
     */
    public function verifieNombre(int $nombre): bool
    {
        if ($nombre < 0) {
            throw new NombreException('Le nombre doit être positif.');
        }
        return true;
    }

    public function checkNumber(int $number): bool
    {

        if ($number < 0) {
            throw new \InvalidArgumentException('Le nombre doit être positif.');
        }
        return true;
    }

    public function checkPassword(string $password): bool
    {
        // Vérifie si la longueur du mot de passe est inférieur à 8
        if (strlen($password) < 8) {
            throw new PasswordException("Le mot de passe doit contenir au moins 8 caractères.");
        }
    }

    // Méthode permettant de vérifier la validité d'un mot de passe
    // Un mot de passe est valide s'il possède au moins 8 caractères, une majuscule, une minuscule et un chiffre
    public function verifierMotPasse(string $password): bool
    {
        // Vérifie si la longueur du mot de passe est inférieur à 8
        if (strlen($password) < 8) {
            throw new PasswordException("Le mot de passe doit contenir au moins 8 caractères.");
        }
        // Vérifie si le mot de passe contient au moins une majuscule
        if (!preg_match('/[A-Z]/', $password)) {
            throw new PasswordException("Le mot de passe doit contenir au moins une majuscule.");
        }
        // Vérifie si le mot de passe contient au moins une minuscule
        if (!preg_match('/[a-z]/', $password)) {
            throw new PasswordException("Le mot de passe doit contenir au moins une minuscule.");
        }
        // Vérifie si le mot de passe contient au moins un chiffre
        if (!preg_match('/[0-9]/', $password)) {
            throw new PasswordException("Le mot de passe doit contenir au moins un chiffre.");
        }
        return true;
    }
}
