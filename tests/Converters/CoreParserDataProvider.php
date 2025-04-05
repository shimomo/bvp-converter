<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

/**
 * @author shimomo
 */
final class CoreParserDataProvider
{
    /**
     * @return array
     */
    public static function parseFlyingCountProvider(): array
    {
        return [
            ['arguments' => ['F0'], 'expected' => 0],
            ['arguments' => ['F1'], 'expected' => 1],
            ['arguments' => ['F０'], 'expected' => 0],
            ['arguments' => ['F１'], 'expected' => 1],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function parseLateCountProvider(): array
    {
        return [
            ['arguments' => ['L0'], 'expected' => 0],
            ['arguments' => ['L1'], 'expected' => 1],
            ['arguments' => ['L０'], 'expected' => 0],
            ['arguments' => ['L１'], 'expected' => 1],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function parseStartTimingProvider(): array
    {
        return [
            ['arguments' => ['F.02'], 'expected' => -0.02],
            ['arguments' => ['0.02'], 'expected' => 0.02],
            ['arguments' => ['F.2'], 'expected' => null],
            ['arguments' => ['F'], 'expected' => null],
            ['arguments' => ['0.2'], 'expected' => null],
            ['arguments' => ['2'], 'expected' => null],
            ['arguments' => ['L.02'], 'expected' => null],
            ['arguments' => ['L2'], 'expected' => null],
            ['arguments' => ['L'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function parseWindProvider(): array
    {
        return [
            ['arguments' => ['2m'], 'expected' => 2],
            ['arguments' => ['2'], 'expected' => 2],
            ['arguments' => ['m'], 'expected' => 0],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function parseWindDirectionNumberProvider(): array
    {
        return [
            ['arguments' => ['is-wind4'], 'expected' => 4],
            ['arguments' => ['is4'], 'expected' => null],
            ['arguments' => ['wind4'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function parseWaveProvider(): array
    {
        return [
            ['arguments' => ['2cm'], 'expected' => 2],
            ['arguments' => ['2'], 'expected' => 2],
            ['arguments' => ['cm'], 'expected' => 0],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function parseTemperatureProvider(): array
    {
        return [
            ['arguments' => ['2.0℃'], 'expected' => 2.0],
            ['arguments' => ['2.0'], 'expected' => 2.0],
            ['arguments' => ['2℃'], 'expected' => 2.0],
            ['arguments' => ['2'], 'expected' => 2.0],
            ['arguments' => ['℃'], 'expected' => 0.0],
            ['arguments' => [null], 'expected' => null],
        ];
    }
}
