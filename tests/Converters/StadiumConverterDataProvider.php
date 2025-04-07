<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

/**
 * @author shimomo
 */
final class StadiumConverterDataProvider
{
    /**
     * @return array
     */
    public static function convertToStadiumNumberProvider(): array
    {
        return [
            ['arguments' => [24], 'expected' => 24],
            ['arguments' => ['ボートレース大村'], 'expected' => 24],
            ['arguments' => ['大村'], 'expected' => 24],
            ['arguments' => ['ぼーとれーすおおむら'], 'expected' => 24],
            ['arguments' => ['ボートレースオオムラ'], 'expected' => 24],
            ['arguments' => ['omura'], 'expected' => 24],
            ['arguments' => ['https://omurakyotei.jp/'], 'expected' => 24],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function convertToStadiumNameProvider(): array
    {
        return [
            ['arguments' => [24], 'expected' => 'ボートレース大村'],
            ['arguments' => ['ボートレース大村'], 'expected' => 'ボートレース大村'],
            ['arguments' => ['大村'], 'expected' => 'ボートレース大村'],
            ['arguments' => ['ぼーとれーすおおむら'], 'expected' => 'ボートレース大村'],
            ['arguments' => ['ボートレースオオムラ'], 'expected' => 'ボートレース大村'],
            ['arguments' => ['omura'], 'expected' => 'ボートレース大村'],
            ['arguments' => ['https://omurakyotei.jp/'], 'expected' => 'ボートレース大村'],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function convertToStadiumShortNameProvider(): array
    {
        return [
            ['arguments' => [24], 'expected' => '大村'],
            ['arguments' => ['ボートレース大村'], 'expected' => '大村'],
            ['arguments' => ['大村'], 'expected' => '大村'],
            ['arguments' => ['ぼーとれーすおおむら'], 'expected' => '大村'],
            ['arguments' => ['ボートレースオオムラ'], 'expected' => '大村'],
            ['arguments' => ['omura'], 'expected' => '大村'],
            ['arguments' => ['https://omurakyotei.jp/'], 'expected' => '大村'],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function convertToStadiumHiraganaNameProvider(): array
    {
        return [
            ['arguments' => [24], 'expected' => 'ぼーとれーすおおむら'],
            ['arguments' => ['ボートレース大村'], 'expected' => 'ぼーとれーすおおむら'],
            ['arguments' => ['大村'], 'expected' => 'ぼーとれーすおおむら'],
            ['arguments' => ['ぼーとれーすおおむら'], 'expected' => 'ぼーとれーすおおむら'],
            ['arguments' => ['ボートレースオオムラ'], 'expected' => 'ぼーとれーすおおむら'],
            ['arguments' => ['omura'], 'expected' => 'ぼーとれーすおおむら'],
            ['arguments' => ['https://omurakyotei.jp/'], 'expected' => 'ぼーとれーすおおむら'],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function convertToStadiumKatakanaNameProvider(): array
    {
        return [
            ['arguments' => [24], 'expected' => 'ボートレースオオムラ'],
            ['arguments' => ['ボートレース大村'], 'expected' => 'ボートレースオオムラ'],
            ['arguments' => ['大村'], 'expected' => 'ボートレースオオムラ'],
            ['arguments' => ['ぼーとれーすおおむら'], 'expected' => 'ボートレースオオムラ'],
            ['arguments' => ['ボートレースオオムラ'], 'expected' => 'ボートレースオオムラ'],
            ['arguments' => ['omura'], 'expected' => 'ボートレースオオムラ'],
            ['arguments' => ['https://omurakyotei.jp/'], 'expected' => 'ボートレースオオムラ'],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function convertToStadiumEnglishNameProvider(): array
    {
        return [
            ['arguments' => [24], 'expected' => 'omura'],
            ['arguments' => ['ボートレース大村'], 'expected' => 'omura'],
            ['arguments' => ['大村'], 'expected' => 'omura'],
            ['arguments' => ['ぼーとれーすおおむら'], 'expected' => 'omura'],
            ['arguments' => ['ボートレースオオムラ'], 'expected' => 'omura'],
            ['arguments' => ['omura'], 'expected' => 'omura'],
            ['arguments' => ['https://omurakyotei.jp/'], 'expected' => 'omura'],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function convertToStadiumUrlProvider(): array
    {
        return [
            ['arguments' => [24], 'expected' => 'https://omurakyotei.jp/'],
            ['arguments' => ['ボートレース大村'], 'expected' => 'https://omurakyotei.jp/'],
            ['arguments' => ['大村'], 'expected' => 'https://omurakyotei.jp/'],
            ['arguments' => ['ぼーとれーすおおむら'], 'expected' => 'https://omurakyotei.jp/'],
            ['arguments' => ['ボートレースオオムラ'], 'expected' => 'https://omurakyotei.jp/'],
            ['arguments' => ['omura'], 'expected' => 'https://omurakyotei.jp/'],
            ['arguments' => ['https://omurakyotei.jp/'], 'expected' => 'https://omurakyotei.jp/'],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }
}
