<?php

namespace App;

class Validateur
{
    public function checkNumber(int $number) : bool
    {
        // test si le nombre est un entier
        if ($number < 0) {
            throw new \InvalidArgumentException('Le nombre doit être positif.');
        }
        return true;
    }
}