<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

/**
 * @author shimomo
 */
final class TechniqueConverterDataProvider
{
    /**
     * @return array
     */
    public static function convertToTechniqueNumberProvider(): array
    {
        return [
            ['arguments' => [2], 'expected' => 2],
            ['arguments' => ['差し'], 'expected' => 2],
            ['arguments' => ['差'], 'expected' => 2],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function convertToTechniqueNameProvider(): array
    {
        return [
            ['arguments' => [2], 'expected' => '差し'],
            ['arguments' => ['差し'], 'expected' => '差し'],
            ['arguments' => ['差'], 'expected' => '差し'],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function convertToTechniqueShortNameProvider(): array
    {
        return [
            ['arguments' => [2], 'expected' => '差'],
            ['arguments' => ['差し'], 'expected' => '差'],
            ['arguments' => ['差'], 'expected' => '差'],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }
}
