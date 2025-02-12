<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

use BVP\Converter\Converters\CoreConverter;
use BVP\Converter\Converters\TechniqueConverter;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
class TechniqueConverterTest extends TestCase
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
        $this->assertSame(2, $this->converter->techniqueId(2));
        $this->assertSame(2, $this->converter->techniqueId('差し'));
        $this->assertSame(2, $this->converter->techniqueId('差'));
        $this->assertNull($this->converter->techniqueId('競艇'));
        $this->assertNull($this->converter->techniqueId(null));
    }

    /**
     * @return void
     */
    public function testTechniqueName(): void
    {
        $this->assertSame('差し', $this->converter->techniqueName(2));
        $this->assertSame('差し', $this->converter->techniqueName('差し'));
        $this->assertSame('差し', $this->converter->techniqueName('差'));
        $this->assertNull($this->converter->techniqueName('競艇'));
        $this->assertNull($this->converter->techniqueName(null));
    }

    /**
     * @return void
     */
    public function testTechniqueShortName(): void
    {
        $this->assertSame('差', $this->converter->techniqueShortName(2));
        $this->assertSame('差', $this->converter->techniqueShortName('差し'));
        $this->assertSame('差', $this->converter->techniqueShortName('差'));
        $this->assertNull($this->converter->techniqueShortName('競艇'));
        $this->assertNull($this->converter->techniqueShortName(null));
    }
}
