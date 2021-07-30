<?php

declare(strict_types=1);

namespace App\Adder\Domain;

interface AdderInterface
{
    public function add(int ...$numbers): int;
}
