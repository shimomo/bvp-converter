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

    /**
     * @return void
     */
    public function testFlying(): void
    {
        $this->assertSame(0, $this->converter->convertToFlyingCount('F0'));
        $this->assertSame(1, $this->converter->convertToFlyingCount('F1'));
        $this->assertSame(0, $this->converter->convertToFlyingCount('F０'));
        $this->assertSame(1, $this->converter->convertToFlyingCount('F１'));
        $this->assertNull($this->converter->convertToFlyingCount(null));
    }

    /**
     * @return void
     */
    public function testLate(): void
    {
        $this->assertSame(0, $this->converter->convertToLateCount('L0'));
        $this->assertSame(1, $this->converter->convertToLateCount('L1'));
        $this->assertSame(0, $this->converter->convertToLateCount('L０'));
        $this->assertSame(1, $this->converter->convertToLateCount('L１'));
        $this->assertNull($this->converter->convertToLateCount(null));
    }

    public function testStartTiming(): void
    {
        $this->assertSame(-0.02, $this->converter->convertToStartTiming('F.02'));
        $this->assertSame(0.02, $this->converter->convertToStartTiming('0.02'));
        $this->assertNull($this->converter->convertToStartTiming('F.2'));
        $this->assertNull($this->converter->convertToStartTiming('F'));
        $this->assertNull($this->converter->convertToStartTiming('0.2'));
        $this->assertNull($this->converter->convertToStartTiming('2'));
        $this->assertNull($this->converter->convertToStartTiming('L.02'));
        $this->assertNull($this->converter->convertToStartTiming('L.2'));
        $this->assertNull($this->converter->convertToStartTiming('L'));
        $this->assertNull($this->converter->convertToStartTiming(null));
    }

    /**
     * @return void
     */
    public function testWind(): void
    {
        $this->assertSame(2, $this->converter->convertToWind('2m'));
        $this->assertSame(2, $this->converter->convertToWind('2'));
        $this->assertSame(0, $this->converter->convertToWind('m'));
        $this->assertNull($this->converter->convertToWind(null));
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
