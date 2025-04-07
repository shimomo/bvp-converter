<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

use BVP\Stadium\Stadium;
use BVP\Trimmer\Trimmer;

/**
 * @author shimomo
 */
class StadiumConverter extends BaseConverter implements StadiumConverterInterface
{
    /**
     * @param  string|int|null  $value
     * @return int|null
     */
    public function convertToStadiumNumber(string|int|null $value): ?int
    {
        return $this->search($value)['number'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToStadiumName(string|int|null $value): ?string
    {
        return $this->search($value)['name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToStadiumShortName(string|int|null $value): ?string
    {
        return $this->search($value)['short_name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToStadiumHiraganaName(string|int|null $value): ?string
    {
        return $this->search($value)['hiragana_name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToStadiumKatakanaName(string|int|null $value): ?string
    {
        return $this->search($value)['katakana_name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToStadiumEnglishName(string|int|null $value): ?string
    {
        return $this->search($value)['english_name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToStadiumUrl(string|int|null $value): ?string
    {
        return $this->search($value)['url'] ?? null;
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

        return Stadium::byNumber($value)
            ?? Stadium::byName($value)
            ?? Stadium::byShortName($value)
            ?? Stadium::byHiraganaName($value)
            ?? Stadium::byKatakanaName($value)
            ?? Stadium::byEnglishName($value)
            ?? Stadium::byUrl($value);
    }
}
