<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

use BVP\Converter\Converters\ClassConverter;
use BVP\Converter\Converters\CoreConverter;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class ClassConverterTest extends TestCase
{
    /**
     * @var \BVP\Converter\Converters\ClassConverter
     */
    protected ClassConverter $converter;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->converter ??= new ClassConverter(
            new CoreConverter()
        );
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(ClassConverterDataProvider::class, 'convertToClassNumberProvider')]
    public function testConvertToClassNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToClassNumber(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ClassConverterDataProvider::class, 'convertToClassNameProvider')]
    public function testConvertToClassName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToClassName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(ClassConverterDataProvider::class, 'convertToClassShortNameProvider')]
    public function testConvertToClassShortName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToClassShortName(...$arguments));
    }
}
