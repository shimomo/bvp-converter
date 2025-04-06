<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

use BVP\Prefecture\Prefecture;
use BVP\Trimmer\Trimmer;

/**
 * @author shimomo
 */
class PrefectureConverter implements PrefectureConverterInterface
{
    /**
     * @param  \BVP\Converter\Converters\CoreConverterInterface  $converter
     * @return void
     */
    public function __construct(private readonly CoreConverterInterface $converter) {}

    /**
     * @param  string|int|null  $value
     * @return int|null
     */
    public function convertToPrefectureNumber(string|int|null $value): ?int
    {
        return $this->resolvePrefecture($value)['id'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToPrefectureName(string|int|null $value): ?string
    {
        return $this->resolvePrefecture($value)['name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToPrefectureShortName(string|int|null $value): ?string
    {
        return $this->resolvePrefecture($value)['short_name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToPrefectureHiraganaName(string|int|null $value): ?string
    {
        return $this->resolvePrefecture($value)['hiragana_name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToPrefectureKatakanaName(string|int|null $value): ?string
    {
        return $this->resolvePrefecture($value)['katakana_name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToPrefectureEnglishName(string|int|null $value): ?string
    {
        return $this->resolvePrefecture($value)['english_name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return array|null
     */
    private function resolvePrefecture(string|int|null $value): ?array
    {
        if (is_null($value)) {
            return null;
        }

        if (is_int($value)) {
            $value = $this->converter->convertToInt($value);
        } else {
            $value = $this->converter->convertToString($value);
        }

        $value = Trimmer::trim($value);
        return $this->searchPrefecture($value);
    }

    /**
     * @param  string|int  $value
     * @return array|null
     */
    private function searchPrefecture(string|int $value): ?array
    {
        return (Prefecture::byId($value)
            ?? Prefecture::byName($value)
            ?? Prefecture::byShortName($value)
            ?? Prefecture::byHiraganaName($value)
            ?? Prefecture::byKatakanaName($value)
            ?? Prefecture::byEnglishName($value))?->toArray();
    }
}
