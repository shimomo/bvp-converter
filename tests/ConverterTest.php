<?php

declare(strict_types=1);

namespace BVP\Converter\Tests;

use BVP\Converter\Converter;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class ConverterTest extends TestCase
{
    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToClassNumberProvider')]
    public function testConvertToClassNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, Converter::convertToClassNumber(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToClassNameProvider')]
    public function testConvertToClassName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, Converter::convertToClassName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToClassShortNameProvider')]
    public function testConvertToClassShortName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, Converter::convertToClassShortName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToStringProvider')]
    public function testConvertToString(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, Converter::convertToString(...$arguments));
    }

    /**
     * @param  array       $arguments
     * @param  float|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToFloatProvider')]
    public function testConvertToFloat(array $arguments, ?float $expected): void
    {
        $this->assertSame($expected, Converter::convertToFloat(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToIntProvider')]
    public function testConvertToInt(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, Converter::convertToInt(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToNameProvider')]
    public function testConvertToName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, Converter::convertToName(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'parseFlyingCountProvider')]
    public function testParseFlyingCount(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, Converter::parseFlyingCount(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'parseLateCountProvider')]
    public function testParseLateCount(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, Converter::parseLateCount(...$arguments));
    }

    /**
     * @param  array       $arguments
     * @param  float|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'parseStartTimingProvider')]
    public function testParseStartTiming(array $arguments, ?float $expected): void
    {
        $this->assertSame($expected, Converter::parseStartTiming(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'parseWindProvider')]
    public function testParseWind(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, Converter::parseWind(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'parseWindDirectionNumberProvider')]
    public function testParseWindDirectionNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, Converter::parseWindDirectionNumber(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'parseWaveProvider')]
    public function testParseWave(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, Converter::parseWave(...$arguments));
    }

    /**
     * @param  array       $arguments
     * @param  float|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'parseTemperatureProvider')]
    public function testParseTemperature(array $arguments, ?float $expected): void
    {
        $this->assertSame($expected, Converter::parseTemperature(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToPlaceNumberProvider')]
    public function testConvertToPlaceNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, Converter::convertToPlaceNumber(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToPlaceNameProvider')]
    public function testConvertToPlaceName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, Converter::convertToPlaceName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToPlaceShortNameProvider')]
    public function testConvertToPlaceShortName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, Converter::convertToPlaceShortName(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToPrefectureNumberProvider')]
    public function testConvertToPrefectureNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, Converter::convertToPrefectureNumber(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToPrefectureNameProvider')]
    public function testConvertToPrefectureName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, Converter::convertToPrefectureName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToPrefectureShortNameProvider')]
    public function testConvertToPrefectureShortName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, Converter::convertToPrefectureShortName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToPrefectureHiraganaNameProvider')]
    public function testConvertToPrefectureHiraganaName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, Converter::convertToPrefectureHiraganaName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToPrefectureKatakanaNameProvider')]
    public function testConvertToPrefectureKatakanaName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, Converter::convertToPrefectureKatakanaName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToPrefectureEnglishNameProvider')]
    public function testConvertToPrefectureEnglishName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, Converter::convertToPrefectureEnglishName(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToStadiumNumberProvider')]
    public function testConvertToStadiumNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, Converter::convertToStadiumNumber(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToStadiumNameProvider')]
    public function testConvertToStadiumName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, Converter::convertToStadiumName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToStadiumShortNameProvider')]
    public function testConvertToStadiumShortName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, Converter::convertToStadiumShortName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToStadiumHiraganaNameProvider')]
    public function testConvertToStadiumHiraganaName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, Converter::convertToStadiumHiraganaName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToStadiumKatakanaNameProvider')]
    public function testConvertToStadiumKatakanaName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, Converter::convertToStadiumKatakanaName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToStadiumEnglishNameProvider')]
    public function testConvertToStadiumEnglishName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, Converter::convertToStadiumEnglishName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToStadiumUrlProvider')]
    public function testConvertToStadiumUrl(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, Converter::convertToStadiumUrl(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToTechniqueNumberProvider')]
    public function testConvertToTechniqueNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, Converter::convertToTechniqueNumber(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToTechniqueNameProvider')]
    public function testConvertToTechniqueName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, Converter::convertToTechniqueName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToTechniqueShortNameProvider')]
    public function testConvertToTechniqueShortName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, Converter::convertToTechniqueShortName(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToWeatherNumberProvider')]
    public function testConvertToWeatherNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, Converter::convertToWeatherNumber(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToWeatherNameProvider')]
    public function testConvertToWeatherName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, Converter::convertToWeatherName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToWeatherShortNameProvider')]
    public function testConvertToWeatherShortName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, Converter::convertToWeatherShortName(...$arguments));
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToWindDirectionNumberProvider')]
    public function testConvertToWindDirectionNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, Converter::convertToWindDirectionNumber(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ConverterCoreDataProvider::class, 'convertToWindDirectionNameProvider')]
    public function testConvertToWindDirectionName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, Converter::convertToWindDirectionName(...$arguments));
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

        Converter::invalid();
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

        Converter::invalid(1, 2);
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

        Converter::invalid(1);
    }
}
