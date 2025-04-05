<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

use BVP\Converter\Converters\ClassConverter;
use BVP\Converter\Converters\CoreConverter;
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
     * @return void
     */
    public function testClassId(): void
    {
        $this->assertSame(4, $this->converter->convertToClassNumber(4));
        $this->assertSame(4, $this->converter->convertToClassNumber('B2級'));
        $this->assertSame(4, $this->converter->convertToClassNumber('B2'));
        $this->assertNull($this->converter->convertToClassNumber('競艇'));
        $this->assertNull($this->converter->convertToClassNumber(null));
    }

    /**
     * @return void
     */
    public function testClassName(): void
    {
        $this->assertSame('B2級', $this->converter->convertToClassName(4));
        $this->assertSame('B2級', $this->converter->convertToClassName('B2級'));
        $this->assertSame('B2級', $this->converter->convertToClassName('B2'));
        $this->assertNull($this->converter->convertToClassName('競艇'));
        $this->assertNull($this->converter->convertToClassName(null));
    }

    /**
     * @return void
     */
    public function testClassShortName(): void
    {
        $this->assertSame('B2', $this->converter->convertToClassShortName(4));
        $this->assertSame('B2', $this->converter->convertToClassShortName('B2級'));
        $this->assertSame('B2', $this->converter->convertToClassShortName('B2'));
        $this->assertNull($this->converter->convertToClassShortName('競艇'));
        $this->assertNull($this->converter->convertToClassShortName(null));
    }
}
