<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
interface StadiumConverterInterface extends ConverterInterface
{
    /**
     * @param  string|int|null  $value
     * @return int|null
     */
    public function convertToStadiumNumber(string|int|null $value): ?int;

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToStadiumName(string|int|null $value): ?string;

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToStadiumShortName(string|int|null $value): ?string;

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToStadiumHiraganaName(string|int|null $value): ?string;

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToStadiumKatakanaName(string|int|null $value): ?string;

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToStadiumEnglishName(string|int|null $value): ?string;
}
