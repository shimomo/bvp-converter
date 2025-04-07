<?php

declare(strict_types=1);

namespace BVP\Converter\Tests;

use BVP\Converter\ConverterCore;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class ConverterCoreTest extends TestCase
{
    /**
     * @var \BVP\Converter\ConverterCore
     */
    protected ConverterCore $converter;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->converter = new ConverterCore();
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToClassNumberProvider')]
    public function testConvertToClassNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToClassNumber(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToClassNameProvider')]
    public function testConvertToClassName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToClassName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToClassShortNameProvider')]
    public function testConvertToClassShortName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToClassShortName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToStringProvider')]
    public function testConvertToString(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToString(...$arguments));
    }

    /**
     * @param  array       $arguments
     * @param  float|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToFloatProvider')]
    public function testConvertToFloat(array $arguments, ?float $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToFloat(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToIntProvider')]
    public function testConvertToInt(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToInt(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToNameProvider')]
    public function testConvertToName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToName(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'parseFlyingCountProvider')]
    public function testParseFlyingCount(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->parseFlyingCount(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'parseLateCountProvider')]
    public function testParseLateCount(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->parseLateCount(...$arguments));
    }

    /**
     * @param  array       $arguments
     * @param  float|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'parseStartTimingProvider')]
    public function testParseStartTiming(array $arguments, ?float $expected): void
    {
        $this->assertSame($expected, $this->converter->parseStartTiming(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'parseWindProvider')]
    public function testParseWind(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->parseWind(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'parseWindDirectionNumberProvider')]
    public function testParseWindDirectionNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->parseWindDirectionNumber(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'parseWaveProvider')]
    public function testParseWave(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->parseWave(...$arguments));
    }

    /**
     * @param  array       $arguments
     * @param  float|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'parseTemperatureProvider')]
    public function testParseTemperature(array $arguments, ?float $expected): void
    {
        $this->assertSame($expected, $this->converter->parseTemperature(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToPlaceNumberProvider')]
    public function testConvertToPlaceNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPlaceNumber(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToPlaceNameProvider')]
    public function testConvertToPlaceName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPlaceName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToPlaceShortNameProvider')]
    public function testConvertToPlaceShortName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPlaceShortName(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToPrefectureNumberProvider')]
    public function testConvertToPrefectureNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPrefectureNumber(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToPrefectureNameProvider')]
    public function testConvertToPrefectureName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPrefectureName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToPrefectureShortNameProvider')]
    public function testConvertToPrefectureShortName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPrefectureShortName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToPrefectureHiraganaNameProvider')]
    public function testConvertToPrefectureHiraganaName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPrefectureHiraganaName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToPrefectureKatakanaNameProvider')]
    public function testConvertToPrefectureKatakanaName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPrefectureKatakanaName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToPrefectureEnglishNameProvider')]
    public function testConvertToPrefectureEnglishName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPrefectureEnglishName(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToStadiumNumberProvider')]
    public function testConvertToStadiumNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumNumber(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToStadiumNameProvider')]
    public function testConvertToStadiumName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToStadiumShortNameProvider')]
    public function testConvertToStadiumShortName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumShortName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToStadiumHiraganaNameProvider')]
    public function testConvertToStadiumHiraganaName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumHiraganaName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToStadiumKatakanaNameProvider')]
    public function testConvertToStadiumKatakanaName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumKatakanaName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToStadiumEnglishNameProvider')]
    public function testConvertToStadiumEnglishName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumEnglishName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToStadiumUrlProvider')]
    public function testConvertToStadiumUrl(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumUrl(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToTechniqueNumberProvider')]
    public function testConvertToTechniqueNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToTechniqueNumber(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToTechniqueNameProvider')]
    public function testConvertToTechniqueName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToTechniqueName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToTechniqueShortNameProvider')]
    public function testConvertToTechniqueShortName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToTechniqueShortName(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToWeatherNumberProvider')]
    public function testConvertToWeatherNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToWeatherNumber(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToWeatherNameProvider')]
    public function testConvertToWeatherName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToWeatherName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToWeatherShortNameProvider')]
    public function testConvertToWeatherShortName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToWeatherShortName(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToWindDirectionNumberProvider')]
    public function testConvertToWindDirectionNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToWindDirectionNumber(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToWindDirectionNameProvider')]
    public function testConvertToWindDirectionName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToWindDirectionName(...$arguments));
    }

    /**
     * @return void
     */
    public function testInvalidTooFewArguments(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'BVP\Converter\ConverterCore::__call() - Too few arguments to function BVP\Converter\ConverterCore::invalid(), ' .
            '0 passed and exactly 1 expected.'
        );

        $this->converter->invalid();
    }

    /**
     * @return void
     */
    public function testInvalidTooManyArguments(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'BVP\Converter\ConverterCore::__call() - Too many arguments to function BVP\Converter\ConverterCore::invalid(), ' .
            '2 passed and exactly 1 expected.'
        );

        $this->converter->invalid(1, 2);
    }

    /**
     * @return void
     */
    public function testInvalidUndefinedMethod(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage(
            'BVP\Converter\ConverterCore::convert() - Call to undefined method BVP\Converter\Converters\CoreConverter::invalid().'
        );

        $this->converter->invalid(1);
    }
}
