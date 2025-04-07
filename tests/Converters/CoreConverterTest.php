<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

use BVP\Converter\Converters\CoreConverter;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class CoreConverterTest extends TestCase
{
    /**
     * @var \BVP\Converter\Converters\CoreConverter
     */
    protected CoreConverter $converter;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->converter = new CoreConverter();
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(CoreConverterDataProvider::class, 'convertToStringProvider')]
    public function testConvertToString(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToString(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(CoreConverterDataProvider::class, 'convertToIntProvider')]
    public function testConvertToInt(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToInt(...$arguments));
    }

    /**
     * @param  array       $arguments
     * @param  float|null  $expected
     * @return void
     */
    #[DataProviderExternal(CoreConverterDataProvider::class, 'convertToFloatProvider')]
    public function testConvertToFloat(array $arguments, ?float $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToFloat(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(CoreConverterDataProvider::class, 'convertToNameProvider')]
    public function testConvertToName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToName(...$arguments));
    }
}
