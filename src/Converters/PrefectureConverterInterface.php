<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
interface PrefectureConverterInterface extends ConverterInterface
{
    /**
     * @param  string|int|null  $value
     * @return int|null
     */
    public function convertToPrefectureNumber(string|int|null $value): ?int;

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToPrefectureName(string|int|null $value): ?string;

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToPrefectureShortName(string|int|null $value): ?string;

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToPrefectureHiraganaName(string|int|null $value): ?string;

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToPrefectureKatakanaName(string|int|null $value): ?string;

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToPrefectureEnglishName(string|int|null $value): ?string;
}
