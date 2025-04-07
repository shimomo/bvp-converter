<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

use BVP\Converter\Converters\CoreConverter;
use BVP\Converter\Converters\WeatherConverter;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class WeatherConverterTest extends TestCase
{
    /**
     * @var \BVP\Converter\Converters\WeatherConverter
     */
    protected WeatherConverter $converter;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->converter = new WeatherConverter(
            new CoreConverter()
        );
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(WeatherConverterDataProvider::class, 'convertToWeatherNumberProvider')]
    public function testConvertToWeatherNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToWeatherNumber(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(WeatherConverterDataProvider::class, 'convertToWeatherNameProvider')]
    public function testConvertToWeatherName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToWeatherName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(WeatherConverterDataProvider::class, 'convertToWeatherShortNameProvider')]
    public function testConvertToWeatherShortName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToWeatherShortName(...$arguments));
    }
}
