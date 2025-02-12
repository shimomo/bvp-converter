<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

use BVP\Converter\Converters\ClassConverter;
use BVP\Converter\Converters\CoreConverter;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
class ClassConverterTest extends TestCase
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
        $this->assertSame(4, $this->converter->classId(4));
        $this->assertSame(4, $this->converter->classId('B2級'));
        $this->assertSame(4, $this->converter->classId('B2'));
        $this->assertNull($this->converter->classId('競艇'));
        $this->assertNull($this->converter->classId(null));
    }

    /**
     * @return void
     */
    public function testClassName(): void
    {
        $this->assertSame('B2級', $this->converter->className(4));
        $this->assertSame('B2級', $this->converter->className('B2級'));
        $this->assertSame('B2級', $this->converter->className('B2'));
        $this->assertNull($this->converter->className('競艇'));
        $this->assertNull($this->converter->className(null));
    }

    /**
     * @return void
     */
    public function testClassShortName(): void
    {
        $this->assertSame('B2', $this->converter->classShortName(4));
        $this->assertSame('B2', $this->converter->classShortName('B2級'));
        $this->assertSame('B2', $this->converter->classShortName('B2'));
        $this->assertNull($this->converter->classShortName('競艇'));
        $this->assertNull($this->converter->classShortName(null));
    }
}
