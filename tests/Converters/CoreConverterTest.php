<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

use BVP\Converter\Converters\CoreConverter;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class CoreConverterTest extends TestCase
{
    /**
     * @var \BVP\Converter\Converters\CoreConverter
     */
    protected CoreConverter $converter;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->converter ??= new CoreConverter();
    }

    /**
     * @return void
     */
    public function testString(): void
    {
        $this->assertSame('1', $this->converter->convertToString(1));
        $this->assertSame('1.2', $this->converter->convertToString(1.2));
        $this->assertSame('1', $this->converter->convertToString('１'));
        $this->assertSame('1.2', $this->converter->convertToString('１.２'));
        $this->assertSame('加藤 峻二', $this->converter->convertToString('加藤 峻二'));
        $this->assertSame('加藤 峻二', $this->converter->convertToString('加藤　峻二'));
        $this->assertNull($this->converter->convertToString(null));
    }

    /**
     * @return void
     */
    public function testInt(): void
    {
        $this->assertSame(1, $this->converter->convertToInt(1));
        $this->assertSame(1, $this->converter->convertToInt(1.2));
        $this->assertSame(0, $this->converter->convertToInt('１'));
        $this->assertSame(0, $this->converter->convertToInt('１.２'));
        $this->assertSame(0, $this->converter->convertToInt('加藤 峻二'));
        $this->assertSame(0, $this->converter->convertToInt('加藤　峻二'));
        $this->assertNull($this->converter->convertToInt(null));
    }

    /**
     * @return void
     */
    public function testFloat(): void
    {
        $this->assertSame(1.0, $this->converter->convertToFloat(1));
        $this->assertSame(1.2, $this->converter->convertToFloat(1.2));
        $this->assertSame(0.0, $this->converter->convertToFloat('１'));
        $this->assertSame(0.0, $this->converter->convertToFloat('１.２'));
        $this->assertSame(0.0, $this->converter->convertToFloat('加藤 峻二'));
        $this->assertSame(0.0, $this->converter->convertToFloat('加藤　峻二'));
        $this->assertNull($this->converter->convertToFloat(null));
    }

    /**
     * @return void
     */
    public function testName(): void
    {
        $this->assertSame('加藤 峻二', $this->converter->convertToName('加藤 峻二'));
        $this->assertSame('加藤 峻二', $this->converter->convertToName(' 加藤 峻二'));
        $this->assertSame('加藤 峻二', $this->converter->convertToName('加藤 峻二 '));
        $this->assertSame('加藤 峻二', $this->converter->convertToName('加藤　峻二'));
        $this->assertSame('加藤 峻二', $this->converter->convertToName('　加藤　峻二'));
        $this->assertSame('加藤 峻二', $this->converter->convertToName('加藤　峻二　'));
        $this->assertNull($this->converter->convertToName('加藤峻二'));
        $this->assertNull($this->converter->convertToName(null));
    }
}
