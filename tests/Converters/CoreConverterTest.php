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
        $this->assertSame('加藤 峻二', $this->converter->name('加藤 峻二'));
        $this->assertSame('加藤 峻二', $this->converter->name(' 加藤 峻二'));
        $this->assertSame('加藤 峻二', $this->converter->name('加藤 峻二 '));
        $this->assertSame('加藤 峻二', $this->converter->name('加藤　峻二'));
        $this->assertSame('加藤 峻二', $this->converter->name('　加藤　峻二'));
        $this->assertSame('加藤 峻二', $this->converter->name('加藤　峻二　'));
        $this->assertNull($this->converter->name('加藤峻二'));
        $this->assertNull($this->converter->name(null));
    }

    /**
     * @return void
     */
    public function testFlying(): void
    {
        $this->assertSame(0, $this->converter->flying('F0'));
        $this->assertSame(1, $this->converter->flying('F1'));
        $this->assertSame(0, $this->converter->flying('F０'));
        $this->assertSame(1, $this->converter->flying('F１'));
        $this->assertNull($this->converter->flying(null));
    }

    /**
     * @return void
     */
    public function testLate(): void
    {
        $this->assertSame(0, $this->converter->late('L0'));
        $this->assertSame(1, $this->converter->late('L1'));
        $this->assertSame(0, $this->converter->late('L０'));
        $this->assertSame(1, $this->converter->late('L１'));
        $this->assertNull($this->converter->late(null));
    }

    public function testStartTiming(): void
    {
        $this->assertSame(-0.02, $this->converter->startTiming('F.02'));
        $this->assertSame(0.02, $this->converter->startTiming('0.02'));
        $this->assertNull($this->converter->startTiming('F.2'));
        $this->assertNull($this->converter->startTiming('F'));
        $this->assertNull($this->converter->startTiming('0.2'));
        $this->assertNull($this->converter->startTiming('2'));
        $this->assertNull($this->converter->startTiming('L.02'));
        $this->assertNull($this->converter->startTiming('L.2'));
        $this->assertNull($this->converter->startTiming('L'));
        $this->assertNull($this->converter->startTiming(null));
    }

    /**
     * @return void
     */
    public function testWind(): void
    {
        $this->assertSame(2, $this->converter->wind('2m'));
        $this->assertSame(2, $this->converter->wind('2'));
        $this->assertSame(0, $this->converter->wind('m'));
        $this->assertNull($this->converter->wind(null));
    }

    /**
     * @return void
     */
    public function testWindDirection(): void
    {
        $this->assertSame(4, $this->converter->windDirection('is-wind4'));
        $this->assertNull($this->converter->windDirection('is4'));
        $this->assertNull($this->converter->windDirection('wind4'));
        $this->assertNull($this->converter->windDirection(null));
    }

    /**
     * @return void
     */
    public function testWave(): void
    {
        $this->assertSame(2, $this->converter->wave('2cm'));
        $this->assertSame(2, $this->converter->wave('2'));
        $this->assertSame(0, $this->converter->wave('cm'));
        $this->assertNull($this->converter->wave(null));
    }

    /**
     * @return void
     */
    public function testTemperature(): void
    {
        $this->assertSame(2.0, $this->converter->temperature('2.0℃'));
        $this->assertSame(2.0, $this->converter->temperature('2.0'));
        $this->assertSame(2.0, $this->converter->temperature('2℃'));
        $this->assertSame(2.0, $this->converter->temperature('2'));
        $this->assertSame(0.0, $this->converter->temperature('℃'));
        $this->assertNull($this->converter->temperature(null));
    }
}
