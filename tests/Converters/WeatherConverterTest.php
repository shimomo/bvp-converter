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
        $this->assertSame(2, $this->converter->convertToWeatherNumber(2));
        $this->assertSame(2, $this->converter->convertToWeatherNumber('曇り'));
        $this->assertSame(2, $this->converter->convertToWeatherNumber('曇'));
        $this->assertNull($this->converter->convertToWeatherNumber('競艇'));
        $this->assertNull($this->converter->convertToWeatherNumber(null));
    }

    /**
     * @return void
     */
    public function testWeatherName(): void
    {
        $this->assertSame('曇り', $this->converter->convertToWeatherName(2));
        $this->assertSame('曇り', $this->converter->convertToWeatherName('曇り'));
        $this->assertSame('曇り', $this->converter->convertToWeatherName('曇'));
        $this->assertNull($this->converter->convertToWeatherName('競艇'));
        $this->assertNull($this->converter->convertToWeatherName(null));
    }

    /**
     * @return void
     */
    public function testWeatherShortName(): void
    {
        $this->assertSame('曇', $this->converter->convertToWeatherShortName(2));
        $this->assertSame('曇', $this->converter->convertToWeatherShortName('曇り'));
        $this->assertSame('曇', $this->converter->convertToWeatherShortName('曇'));
        $this->assertNull($this->converter->convertToWeatherShortName('競艇'));
        $this->assertNull($this->converter->convertToWeatherShortName(null));
    }
}
