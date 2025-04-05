<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

use BVP\Converter\Converters\CoreConverter;
use BVP\Converter\Converters\CoreParser;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class CoreParserTest extends TestCase
{
    /**
     * @var \BVP\Converter\Converters\CoreParser
     */
    protected CoreParser $parser;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->parser = new CoreParser(
            new CoreConverter()
        );
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(CoreParserDataProvider::class, 'parseFlyingCountProvider')]
    public function testParseFlyingCount(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->parser->parseFlyingCount(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(CoreParserDataProvider::class, 'parseLateCountProvider')]
    public function testParseLateCount(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->parser->parseLateCount(...$arguments));
    }

    /**
     * @param  array       $arguments
     * @param  float|null  $expected
     * @return void
     */
    #[DataProviderExternal(CoreParserDataProvider::class, 'parseStartTimingProvider')]
    public function testParseStartTiming(array $arguments, ?float $expected): void
    {
        $this->assertSame($expected, $this->parser->parseStartTiming(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(CoreParserDataProvider::class, 'parseWindProvider')]
    public function testParseWind(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->parser->parseWind(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(CoreParserDataProvider::class, 'parseWindDirectionNumberProvider')]
    public function testParseWindDirectionNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->parser->parseWindDirectionNumber(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(CoreParserDataProvider::class, 'parseWaveProvider')]
    public function testParseWave(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->parser->parseWave(...$arguments));
    }

    /**
     * @param  array       $arguments
     * @param  float|null  $expected
     * @return void
     */
    #[DataProviderExternal(CoreParserDataProvider::class, 'parseTemperatureProvider')]
    public function testParseTemperature(array $arguments, ?float $expected): void
    {
        $this->assertSame($expected, $this->parser->parseTemperature(...$arguments));
    }
}
