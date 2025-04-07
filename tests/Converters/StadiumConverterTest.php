<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

use BVP\Converter\Converters\CoreConverter;
use BVP\Converter\Converters\StadiumConverter;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class StadiumConverterTest extends TestCase
{
    /**
     * @var \BVP\Converter\Converters\StadiumConverter
     */
    protected StadiumConverter $converter;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->converter ??= new StadiumConverter(
            new CoreConverter()
        );
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(StadiumConverterDataProvider::class, 'convertToStadiumNumberProvider')]
    public function testConvertToStadiumNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumNumber(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(StadiumConverterDataProvider::class, 'convertToStadiumNameProvider')]
    public function testConvertToStadiumName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(StadiumConverterDataProvider::class, 'convertToStadiumShortNameProvider')]
    public function testConvertToStadiumShortName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumShortName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(StadiumConverterDataProvider::class, 'convertToStadiumHiraganaNameProvider')]
    public function testConvertToStadiumHiraganaName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumHiraganaName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(StadiumConverterDataProvider::class, 'convertToStadiumKatakanaNameProvider')]
    public function testConvertToStadiumKatakanaName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumKatakanaName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(StadiumConverterDataProvider::class, 'convertToStadiumEnglishNameProvider')]
    public function testConvertToStadiumEnglishName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumEnglishName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(StadiumConverterDataProvider::class, 'convertToStadiumUrlProvider')]
    public function testConvertToStadiumUrl(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToStadiumUrl(...$arguments));
    }
}
