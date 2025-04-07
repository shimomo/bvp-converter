<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

/**
 * @author shimomo
 */
final class PrefectureConverterDataProvider
{
    /**
     * @return array
     */
    public static function convertToPrefectureNumberProvider(): array
    {
        return [
            ['arguments' => [13], 'expected' => 13],
            ['arguments' => ['東京都'], 'expected' => 13],
            ['arguments' => ['東京'], 'expected' => 13],
            ['arguments' => ['とうきょうと'], 'expected' => 13],
            ['arguments' => ['トウキョウト'], 'expected' => 13],
            ['arguments' => ['tokyo'], 'expected' => 13],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function convertToPrefectureNameProvider(): array
    {
        return [
            ['arguments' => [13], 'expected' => '東京都'],
            ['arguments' => ['東京都'], 'expected' => '東京都'],
            ['arguments' => ['東京'], 'expected' => '東京都'],
            ['arguments' => ['とうきょうと'], 'expected' => '東京都'],
            ['arguments' => ['トウキョウト'], 'expected' => '東京都'],
            ['arguments' => ['tokyo'], 'expected' => '東京都'],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function convertToPrefectureShortNameProvider(): array
    {
        return [
            ['arguments' => [13], 'expected' => '東京'],
            ['arguments' => ['東京都'], 'expected' => '東京'],
            ['arguments' => ['東京'], 'expected' => '東京'],
            ['arguments' => ['とうきょうと'], 'expected' => '東京'],
            ['arguments' => ['トウキョウト'], 'expected' => '東京'],
            ['arguments' => ['tokyo'], 'expected' => '東京'],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function convertToPrefectureHiraganaNameProvider(): array
    {
        return [
            ['arguments' => [13], 'expected' => 'とうきょうと'],
            ['arguments' => ['東京都'], 'expected' => 'とうきょうと'],
            ['arguments' => ['東京'], 'expected' => 'とうきょうと'],
            ['arguments' => ['とうきょうと'], 'expected' => 'とうきょうと'],
            ['arguments' => ['トウキョウト'], 'expected' => 'とうきょうと'],
            ['arguments' => ['tokyo'], 'expected' => 'とうきょうと'],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function convertToPrefectureKatakanaNameProvider(): array
    {
        return [
            ['arguments' => [13], 'expected' => 'トウキョウト'],
            ['arguments' => ['東京都'], 'expected' => 'トウキョウト'],
            ['arguments' => ['東京'], 'expected' => 'トウキョウト'],
            ['arguments' => ['とうきょうと'], 'expected' => 'トウキョウト'],
            ['arguments' => ['トウキョウト'], 'expected' => 'トウキョウト'],
            ['arguments' => ['tokyo'], 'expected' => 'トウキョウト'],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function convertToPrefectureEnglishNameProvider(): array
    {
        return [
            ['arguments' => [13], 'expected' => 'tokyo'],
            ['arguments' => ['東京都'], 'expected' => 'tokyo'],
            ['arguments' => ['東京'], 'expected' => 'tokyo'],
            ['arguments' => ['とうきょうと'], 'expected' => 'tokyo'],
            ['arguments' => ['トウキョウト'], 'expected' => 'tokyo'],
            ['arguments' => ['tokyo'], 'expected' => 'tokyo'],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }
}
