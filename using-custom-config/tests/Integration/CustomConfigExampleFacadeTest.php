<?php

declare(strict_types=1);

namespace Tests\Integration;

use App\CustomConfigExample\Facade as CustomConfigExampleFacade;
use Gacela\Framework\Bootstrap\GacelaConfig;
use Gacela\Framework\Config\ConfigReader\EnvConfigReader;
use Gacela\Framework\Gacela;
use Generator;
use PHPUnit\Framework\TestCase;

final class CustomConfigExampleFacadeTest extends TestCase
{
    public function setUp(): void
    {
        Gacela::bootstrap(__DIR__, static function (GacelaConfig $config): void {
            $config->addAppConfig('.env', '', EnvConfigReader::class);
        });
    }

    /**
     * @dataProvider providerAdd
     */
    public function test_it_can_add(int $expected, array $numbers): void
    {
        $facade = new CustomConfigExampleFacade();

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
