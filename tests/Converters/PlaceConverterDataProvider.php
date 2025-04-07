<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

/**
 * @author shimomo
 */
final class PlaceConverterDataProvider
{
    /**
     * @return array
     */
    public static function convertToPlaceNumberProvider(): array
    {
        return [
            ['arguments' => [8], 'expected' => 8],
            ['arguments' => ['エンスト失格'], 'expected' => 8],
            ['arguments' => ['エ'], 'expected' => 8],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function convertToPlaceNameProvider(): array
    {
        return [
            ['arguments' => [8], 'expected' => 'エンスト失格'],
            ['arguments' => ['エンスト失格'], 'expected' => 'エンスト失格'],
            ['arguments' => ['エ'], 'expected' => 'エンスト失格'],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function convertToPlaceShortNameProvider(): array
    {
        return [
            ['arguments' => [8], 'expected' => 'エ'],
            ['arguments' => ['エンスト失格'], 'expected' => 'エ'],
            ['arguments' => ['エ'], 'expected' => 'エ'],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }
}
