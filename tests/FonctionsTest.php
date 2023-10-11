<?php

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class FonctionsTest extends TestCase
{
    #[test]
    public function testCheckNumber()
    {
        $this->assertTrue(\App\checkNumber(10));
        $this->assertFalse(\App\checkNumber(-10));
    }
}
