<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

use BVP\Converter\Converters\CoreConverter;
use BVP\Converter\Converters\TechniqueConverter;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class TechniqueConverterTest extends TestCase
{
    /**
     * @var \BVP\Converter\Converters\TechniqueConverter
     */
    protected TechniqueConverter $converter;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->converter = new TechniqueConverter(
            new CoreConverter()
        );
    }

    /**
     * @param  array     $arguments
     * @param  int|null  $expected
     * @return void
     */
    #[DataProviderExternal(TechniqueConverterDataProvider::class, 'convertToTechniqueNumberProvider')]
    public function testConvertToTechniqueNumber(array $arguments, ?int $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToTechniqueNumber(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(TechniqueConverterDataProvider::class, 'convertToTechniqueNameProvider')]
    public function testConvertToTechniqueName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToTechniqueName(...$arguments));
    }

    /**
     * @param  array        $arguments
     * @param  string|null  $expected
     * @return void
     */
    #[DataProviderExternal(TechniqueConverterDataProvider::class, 'convertToTechniqueShortNameProvider')]
    public function testConvertToTechniqueShortName(array $arguments, ?string $expected): void
    {
        $this->assertSame($expected, $this->converter->convertToTechniqueShortName(...$arguments));
    }
}
