<?php

namespace Tests\Unit\Validateur;

use App\Exceptions\NombreException;
use App\Exceptions\PasswordException;
use App\Validateur\Validateur;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ValidateurTest extends TestCase {

    #[test]
    public function CheckNumber_PositiveNumber_True() {
        $validateur = new Validateur();
        $resultat = $validateur->verifieNombre(1);
        $this->assertTrue($resultat);
    }
//    #[test]
//    public function CheckNumber_NegativeNumber_False() {
//        $validateur = new Validateur();
//        $resultat = $validateur->checkNumber(-2);
//        $this->assertFalse($resultat);
//    }
    #[test]
    public function CheckNumber_NegativeNumber_NombreException() {
        $validateur = new Validateur();
        $this->expectException(NombreException::class);
        $this->expectExceptionMessage('Le nombre doit être positif.');
        $resultat = $validateur->verifieNombre(-2);
    }

    #[test]
    public function CheckPassword_LengthMinus8_PasswordException() {
        $validateur = new Validateur();
        $this->expectException(PasswordException::class);
        //$this->expectExceptionMessage('Le nombre doit être positif.');
        $resultat = $validateur->checkPassword("passe");
    }
    #[test]
    public function CheckPassword_NoUpper__PasswordException() {
        $validateur = new Validateur();
        $this->expectException(PasswordException::class);
        $this->expectExceptionMessage('Le mot de passe doit contenir au moins une majuscule.');
        $resultat = $validateur->verifierMotPasse("passepasse");
    }

    #[test]
    public function CheckPassword_NoLower__PasswordException() {
        $validateur = new Validateur();
        $this->expectException(PasswordException::class);
        $this->expectExceptionMessage('Le mot de passe doit contenir au moins une minuscule.');
        $resultat = $validateur->verifierMotPasse("PPAPAPAPAKJS");
    }
    #[test]
    public function CheckPassword_NoDigit__PasswordException() {
        $validateur = new Validateur();
        $this->expectException(PasswordException::class);
        $this->expectExceptionMessage('Le mot de passe doit contenir au moins un chiffre.');
        $resultat = $validateur->verifierMotPasse("PoajkjkkjzajP");
    }
    #[test]
    public function CheckPassword_CorrectPassword__True() {
        $validateur = new Validateur();
        $resultat = $validateur->verifierMotPasse("Passepasse1");
        $this->assertTrue($resultat);
    }

}