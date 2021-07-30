<?php

declare(strict_types=1);

namespace Tests\Integration;

use App\Adder\Facade;
use Gacela\Framework\Config;
use Generator;
use PHPUnit\Framework\TestCase;

final class ExampleModuleFacadeTest extends TestCase
{
    public function setUp(): void
    {
        Config::getInstance()->init(__DIR__);
    }

    /**
     * @dataProvider providerAdd
     */
    public function test_it_can_add(int $expected, array $numbers): void
    {
        $facade = new Facade();

        self::assertSame($expected, $facade->add(...$numbers));
    }

    public function providerAdd(): Generator
    {
        yield 'when no numbers, the result is zero' => [
            'expected' => 0,
            'numbers' => [],
        ];

        yield 'when a single number, the result is the same number' => [
            'expected' => 1,
            'numbers' => [1],
        ];

        yield 'when two numbers, the result is the sum of both' => [
            'expected' => 3,
            'numbers' => [1, 2],
        ];

        yield 'when multiple numbers, the result is the sum of all of them' => [
            'expected' => 10,
            'numbers' => [1, 2, 3, 4],
        ];
    }
}
