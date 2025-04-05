<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

use BVP\Converter\Converters\CoreConverter;
use BVP\Converter\Converters\TechniqueConverter;
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
        $this->converter ??= new TechniqueConverter(
            new CoreConverter()
        );
    }

    /**
     * @return void
     */
    public function testTechniqueId(): void
    {
        $this->assertSame(2, $this->converter->convertToTechniqueNumber(2));
        $this->assertSame(2, $this->converter->convertToTechniqueNumber('差し'));
        $this->assertSame(2, $this->converter->convertToTechniqueNumber('差'));
        $this->assertNull($this->converter->convertToTechniqueNumber('競艇'));
        $this->assertNull($this->converter->convertToTechniqueNumber(null));
    }

    /**
     * @return void
     */
    public function testTechniqueName(): void
    {
        $this->assertSame('差し', $this->converter->convertToTechniqueName(2));
        $this->assertSame('差し', $this->converter->convertToTechniqueName('差し'));
        $this->assertSame('差し', $this->converter->convertToTechniqueName('差'));
        $this->assertNull($this->converter->convertToTechniqueName('競艇'));
        $this->assertNull($this->converter->convertToTechniqueName(null));
    }

    /**
     * @return void
     */
    public function testTechniqueShortName(): void
    {
        $this->assertSame('差', $this->converter->convertToTechniqueShortName(2));
        $this->assertSame('差', $this->converter->convertToTechniqueShortName('差し'));
        $this->assertSame('差', $this->converter->convertToTechniqueShortName('差'));
        $this->assertNull($this->converter->convertToTechniqueShortName('競艇'));
        $this->assertNull($this->converter->convertToTechniqueShortName(null));
    }
}
