<?php
namespace App;
// Fonction qui lance une exception si le paramètre est négatif
function checkNumber(int $number) : bool {
    if ($number < 0) {
        return false;
    }
    return true;
}