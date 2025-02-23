<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

use BVP\Converter\Converters\CoreConverter;
use BVP\Converter\Converters\WeatherConverter;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class WeatherConverterTest extends TestCase
{
    /**
     * @var \BVP\Converter\Converters\WeatherConverter
     */
    protected WeatherConverter $converter;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->converter ??= new WeatherConverter(
            new CoreConverter()
        );
    }

    /**
     * @return void
     */
    public function testWeatherId(): void
    {
        $this->assertSame(2, $this->converter->weatherId(2));
        $this->assertSame(2, $this->converter->weatherId('曇り'));
        $this->assertSame(2, $this->converter->weatherId('曇'));
        $this->assertNull($this->converter->weatherId('競艇'));
        $this->assertNull($this->converter->weatherId(null));
    }

    /**
     * @return void
     */
    public function testWeatherName(): void
    {
        $this->assertSame('曇り', $this->converter->weatherName(2));
        $this->assertSame('曇り', $this->converter->weatherName('曇り'));
        $this->assertSame('曇り', $this->converter->weatherName('曇'));
        $this->assertNull($this->converter->weatherName('競艇'));
        $this->assertNull($this->converter->weatherName(null));
    }

    /**
     * @return void
     */
    public function testWeatherShortName(): void
    {
        $this->assertSame('曇', $this->converter->weatherShortName(2));
        $this->assertSame('曇', $this->converter->weatherShortName('曇り'));
        $this->assertSame('曇', $this->converter->weatherShortName('曇'));
        $this->assertNull($this->converter->weatherShortName('競艇'));
        $this->assertNull($this->converter->weatherShortName(null));
    }
}
