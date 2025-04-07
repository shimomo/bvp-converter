<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

use BVP\Prefecture\Prefecture;
use BVP\Trimmer\Trimmer;

/**
 * @author shimomo
 */
class PrefectureConverter extends BaseConverter implements PrefectureConverterInterface
{
    /**
     * @param  string|int|null  $value
     * @return int|null
     */
    public function convertToPrefectureNumber(string|int|null $value): ?int
    {
        return $this->search($value)['id'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToPrefectureName(string|int|null $value): ?string
    {
        return $this->search($value)['name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToPrefectureShortName(string|int|null $value): ?string
    {
        return $this->search($value)['short_name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToPrefectureHiraganaName(string|int|null $value): ?string
    {
        return $this->search($value)['hiragana_name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToPrefectureKatakanaName(string|int|null $value): ?string
    {
        return $this->search($value)['katakana_name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToPrefectureEnglishName(string|int|null $value): ?string
    {
        return $this->search($value)['english_name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return array|null
     */
    protected function search(string|int|null $value): ?array
    {
        if (is_string($value)) {
            $value = Trimmer::trim($this->converter->convertToString($value));
        } elseif (is_int($value)) {
            $value = Trimmer::trim($this->converter->convertToInt($value));
        } else {
            return null;
        }

        return (Prefecture::byId($value)
            ?? Prefecture::byName($value)
            ?? Prefecture::byShortName($value)
            ?? Prefecture::byHiraganaName($value)
            ?? Prefecture::byKatakanaName($value)
            ?? Prefecture::byEnglishName($value))?->toArray();
    }
}
