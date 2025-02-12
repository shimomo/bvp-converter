<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

use BVP\Converter\Converters\CoreConverter;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * @author shimomo
 */
class CoreConverterTest extends PHPUnitTestCase
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
        $this->assertSame('1', $this->converter->string(1));
        $this->assertSame('1.2', $this->converter->string(1.2));
        $this->assertSame('1', $this->converter->string('１'));
        $this->assertSame('1.2', $this->converter->string('１.２'));
        $this->assertSame('加藤 峻二', $this->converter->string('加藤 峻二'));
        $this->assertSame('加藤 峻二', $this->converter->string('加藤　峻二'));
        $this->assertNull($this->converter->string(null));
    }

    /**
     * @return void
     */
    public function testInt(): void
    {
        $this->assertSame(1, $this->converter->int(1));
        $this->assertSame(1, $this->converter->int(1.2));
        $this->assertSame(0, $this->converter->int('１'));
        $this->assertSame(0, $this->converter->int('１.２'));
        $this->assertSame(0, $this->converter->int('加藤 峻二'));
        $this->assertSame(0, $this->converter->int('加藤　峻二'));
        $this->assertNull($this->converter->int(null));
    }

    /**
     * @return void
     */
    public function testFloat(): void
    {
        $this->assertSame(1.0, $this->converter->float(1));
        $this->assertSame(1.2, $this->converter->float(1.2));
        $this->assertSame(0.0, $this->converter->float('１'));
        $this->assertSame(0.0, $this->converter->float('１.２'));
        $this->assertSame(0.0, $this->converter->float('加藤 峻二'));
        $this->assertSame(0.0, $this->converter->float('加藤　峻二'));
        $this->assertNull($this->converter->float(null));
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
