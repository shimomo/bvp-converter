<?php

declare(strict_types=1);

namespace BVP\Converter\Tests;

/**
 * @author shimomo
 */
final class ConverterCoreDataProvider
{
    /**
     * @return array
     */
    public static function convertToClassNumberProvider(): array
    {
        return [
            ['arguments' => [4], 'expected' => 4],
            ['arguments' => ['B2級'], 'expected' => 4],
            ['arguments' => ['B2'], 'expected' => 4],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function convertToClassNameProvider(): array
    {
        return [
            ['arguments' => [4], 'expected' => 'B2級'],
            ['arguments' => ['B2級'], 'expected' => 'B2級'],
            ['arguments' => ['B2'], 'expected' => 'B2級'],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function convertToClassShortNameProvider(): array
    {
        return [
            ['arguments' => [4], 'expected' => 'B2'],
            ['arguments' => ['B2級'], 'expected' => 'B2'],
            ['arguments' => ['B2'], 'expected' => 'B2'],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

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

    /**
     * @return array
     */
    public static function convertToWindDirectionNumberProvider(): array
    {
        return [
            ['arguments' => [4], 'expected' => 4],
            ['arguments' => ['東北東'], 'expected' => 4],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }

    /**
     * @return array
     */
    public static function convertToWindDirectionNameProvider(): array
    {
        return [
            ['arguments' => [4], 'expected' => '東北東'],
            ['arguments' => ['東北東'], 'expected' => '東北東'],
            ['arguments' => ['競艇'], 'expected' => null],
            ['arguments' => [null], 'expected' => null],
        ];
    }
}
