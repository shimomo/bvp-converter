<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

/**
 * @author shimomo
 */
final class CoreConverterDataProvider
{
    /**
     * @return array
     */
    public static function convertToStringProvider(): array
    {
        return [
            ['arguments' => [1], 'expected' => '1'],
            ['arguments' => [1.2], 'expected' => '1.2'],
            ['arguments' => ['１'], 'expected' => '1'],
            ['arguments' => ['１.２'], 'expected' => '1.2'],
            ['arguments' => ['加藤 峻二'], 'expected' => '加藤 峻二'],
            ['arguments' => ['加藤　峻二'], 'expected' => '加藤 峻二'],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function convertToIntProvider(): array
    {
        return [
            ['arguments' => [1], 'expected' => 1],
            ['arguments' => [1.2], 'expected' => 1],
            ['arguments' => ['１'], 'expected' => 0],
            ['arguments' => ['１.２'], 'expected' => 0],
            ['arguments' => ['加藤 峻二'], 'expected' => 0],
            ['arguments' => ['加藤　峻二'], 'expected' => 0],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function convertToFloatProvider(): array
    {
        return [
            ['arguments' => [1], 'expected' => 1.0],
            ['arguments' => [1.2], 'expected' => 1.2],
            ['arguments' => ['１'], 'expected' => 0.0],
            ['arguments' => ['１.２'], 'expected' => 0.0],
            ['arguments' => ['加藤 峻二'], 'expected' => 0.0],
            ['arguments' => ['加藤　峻二'], 'expected' => 0.0],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function convertToNameProvider(): array
    {
        return [
            ['arguments' => ['加藤 峻二'], 'expected' => '加藤 峻二'],
            ['arguments' => [' 加藤 峻二'], 'expected' => '加藤 峻二'],
            ['arguments' => ['加藤 峻二 '], 'expected' => '加藤 峻二'],
            ['arguments' => ['加藤　峻二'], 'expected' => '加藤 峻二'],
            ['arguments' => ['　加藤　峻二'], 'expected' => '加藤 峻二'],
            ['arguments' => ['加藤　峻二　'], 'expected' => '加藤 峻二'],
            ['arguments' => ['加藤峻二'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }
}
