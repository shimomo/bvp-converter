<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

use BVP\Stadium\Stadium;
use BVP\Trimmer\Trimmer;

/**
 * @author shimomo
 */
class StadiumConverter implements StadiumConverterInterface
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
    public function convertToStadiumNumber(string|int|null $value): ?int
    {
        return $this->resolveStadium($value)['id'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToStadiumName(string|int|null $value): ?string
    {
        return $this->resolveStadium($value)['name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToStadiumShortName(string|int|null $value): ?string
    {
        return $this->resolveStadium($value)['short_name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToStadiumHiraganaName(string|int|null $value): ?string
    {
        return $this->resolveStadium($value)['hiragana_name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToStadiumKatakanaName(string|int|null $value): ?string
    {
        return $this->resolveStadium($value)['katakana_name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToStadiumEnglishName(string|int|null $value): ?string
    {
        return $this->resolveStadium($value)['english_name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToStadiumUrl(string|int|null $value): ?string
    {
        return $this->resolveStadium($value)['url'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return array|null
     */
    private function resolveStadium(string|int|null $value): ?array
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
        return $this->searchStadium($value);
    }

    /**
     * @param  string|int  $value
     * @return array|null
     */
    private function searchStadium(string|int $value): ?array
    {
        return (Stadium::byId($value)
            ?? Stadium::byName($value)
            ?? Stadium::byShortName($value)
            ?? Stadium::byHiraganaName($value)
            ?? Stadium::byKatakanaName($value)
            ?? Stadium::byEnglishName($value)
            ?? Stadium::byUrl($value))?->toArray();
    }
}
