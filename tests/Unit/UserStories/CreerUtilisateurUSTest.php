<?php

namespace Tests\Unit\UserStories;

use App\Exceptions\NombreException;
use App\Exceptions\PasswordException;
use App\UserStories\CreerUtilisateurUS;
use App\Validateur\Validateur;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class CreerUtilisateurUSTest extends TestCase
{

    #[test]
    public function CreerUtilisateurUS_PasswordValid_True()
    {
        $mockValidateur = $this->createMock(Validateur::class);
        $mockValidateur->expects($this->once())
            ->method('verifierMotPasse')
            ->willReturn(true);
        $creerUtilisateurUS = new CreerUtilisateurUS($mockValidateur);
        $resultat = $creerUtilisateurUS->execute("login", "PassePasse12");
        $this->assertTrue($resultat);
    }

    #[test]
    public function CreerUtilisateurUS_PasswordInvalid_PasswordException()
    {
        $mockValidateur = $this->createMock(Validateur::class);
        $mockValidateur->expects($this->once())
            ->method('verifierMotPasse')
            ->will($this->throwException(new PasswordException));
        $creerUtilisateurUS = new CreerUtilisateurUS($mockValidateur);
        $this->expectException(PasswordException::class);
        $resultat = $creerUtilisateurUS->execute("login", "Passe12");
    }
}
