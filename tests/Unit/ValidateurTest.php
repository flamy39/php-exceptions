<?php

namespace AppTests\Unit;

use App\Exceptions\PasswordException;
use App\Validateur;
use PHPUnit\Event\Test\Passed;
use PHPUnit\Framework\Attributes\Test;

class ValidateurTest extends \PHPUnit\Framework\TestCase {

    #[test]
    public function CheckNumber_PositiveNumber_True() {
        $validateur = new Validateur();
        $resultat = $validateur->checkNumber(1);
        $this->assertTrue($resultat);
    }
//    #[test]
//    public function CheckNumber_NegativeNumber_False() {
//        $validateur = new Validateur();
//        $resultat = $validateur->checkNumber(-2);
//        $this->assertFalse($resultat);
//    }
    #[test]
    public function CheckNumber_NegativeNumber_InvalidArgumentException() {
        $validateur = new Validateur();
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Le nombre doit être positif.');
        $resultat = $validateur->checkNumber(-2);
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
        $resultat = $validateur->checkPassword2("passepasse");
    }

    #[test]
    public function CheckPassword_NoLower__PasswordException() {
        $validateur = new Validateur();
        $this->expectException(PasswordException::class);
        $this->expectExceptionMessage('Le mot de passe doit contenir au moins une minuscule.');
        $resultat = $validateur->checkPassword2("PPAPAPAPAKJS");
    }
    #[test]
    public function CheckPassword_NoDigit__PasswordException() {
        $validateur = new Validateur();
        $this->expectException(PasswordException::class);
        $this->expectExceptionMessage('Le mot de passe doit contenir au moins un chiffre.');
        $resultat = $validateur->checkPassword2("PoajkjkkjzajP");
    }
    #[test]
    public function CheckPassword_CorrectPassword__True() {
        $validateur = new Validateur();
        $resultat = $validateur->checkPassword2("Passepasse1");
        $this->assertTrue($resultat);
    }

}