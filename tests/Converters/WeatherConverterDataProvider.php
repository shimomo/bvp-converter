<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

/**
 * @author shimomo
 */
final class WeatherConverterDataProvider
{
    /**
     * @return array
     */
    public static function convertToWeatherNumberProvider(): array
    {
        return [
            ['arguments' => [2], 'expected' => 2],
            ['arguments' => ['曇り'], 'expected' => 2],
            ['arguments' => ['曇'], 'expected' => 2],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function convertToWeatherNameProvider(): array
    {
        return [
            ['arguments' => [2], 'expected' => '曇り'],
            ['arguments' => ['曇り'], 'expected' => '曇り'],
            ['arguments' => ['曇'], 'expected' => '曇り'],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function convertToWeatherShortNameProvider(): array
    {
        return [
            ['arguments' => [2], 'expected' => '曇'],
            ['arguments' => ['曇り'], 'expected' => '曇'],
            ['arguments' => ['曇'], 'expected' => '曇'],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }
}
