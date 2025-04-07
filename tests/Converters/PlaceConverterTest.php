<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

use BVP\Converter\Converters\CoreConverter;
use BVP\Converter\Converters\PlaceConverter;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class PlaceConverterTest extends TestCase
{
    /**
     * @var \BVP\Converter\Converters\PlaceConverter
     */
    protected PlaceConverter $converter;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->converter ??= new PlaceConverter(
            new CoreConverter()
        );
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(PlaceConverterDataProvider::class, 'convertToPlaceNumberProvider')]
    public function testConvertToPlaceNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPlaceNumber(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(PlaceConverterDataProvider::class, 'convertToPlaceNameProvider')]
    public function testConvertToPlaceName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPlaceName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(PlaceConverterDataProvider::class, 'convertToPlaceShortNameProvider')]
    public function testConvertToPlaceShortName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPlaceShortName(...$arguments));
    }
}
