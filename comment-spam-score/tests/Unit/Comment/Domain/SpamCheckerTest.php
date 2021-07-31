<?php

declare(strict_types=1);

namespace Tests\Unit\Comment\Domain;

use PHPUnit\Framework\TestCase;

final class SpamCheckerTest extends TestCase
{
    public function test_nothing(): void
    {
        self::assertEquals(1, 1);
    }
}
