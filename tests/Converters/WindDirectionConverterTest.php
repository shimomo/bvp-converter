<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

use BVP\Converter\Converters\CoreConverter;
use BVP\Converter\Converters\WindDirectionConverter;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class WindDirectionConverterTest extends TestCase
{
    /**
     * @var \BVP\Converter\Converters\WindDirectionConverter
     */
    protected WindDirectionConverter $converter;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->converter ??= new WindDirectionConverter(
            new CoreConverter()
        );
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(WindDirectionConverterDataProvider::class, 'convertToWindDirectionNumberProvider')]
    public function testConvertToWindDirectionNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToWindDirectionNumber(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(WindDirectionConverterDataProvider::class, 'convertToWindDirectionNameProvider')]
    public function testConvertToWindDirectionName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToWindDirectionName(...$arguments));
    }
}
