<?php

namespace AppTests\Unit;

use App\Validateur;
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
}