<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

use BVP\Converter\Converters\CoreConverter;
use BVP\Converter\Converters\PrefectureConverter;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class PrefectureConverterTest extends TestCase
{
    /**
     * @var \BVP\Converter\Converters\PrefectureConverter
     */
    protected PrefectureConverter $converter;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->converter ??= new PrefectureConverter(
            new CoreConverter()
        );
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureConverterDataProvider::class, 'convertToPrefectureNumberProvider')]
    public function testConvertToPrefectureNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPrefectureNumber(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureConverterDataProvider::class, 'convertToPrefectureNameProvider')]
    public function testConvertToPrefectureName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPrefectureName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureConverterDataProvider::class, 'convertToPrefectureShortNameProvider')]
    public function testConvertToPrefectureShortName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPrefectureShortName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureConverterDataProvider::class, 'convertToPrefectureHiraganaNameProvider')]
    public function testConvertToPrefectureHiraganaName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPrefectureHiraganaName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureConverterDataProvider::class, 'convertToPrefectureKatakanaNameProvider')]
    public function testConvertToPrefectureKatakanaName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPrefectureKatakanaName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(PrefectureConverterDataProvider::class, 'convertToPrefectureEnglishNameProvider')]
    public function testConvertToPrefectureEnglishName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToPrefectureEnglishName(...$arguments));
    }
}
