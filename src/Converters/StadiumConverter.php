<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

use BVP\Stadium\Stadium;
use BVP\Trimmer\Trimmer;
use Illuminate\Support\Collection;

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
        return $this->resolveStadium($value)?->get('id');
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToStadiumName(string|int|null $value): ?string
    {
        return $this->resolveStadium($value)?->get('name');
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToStadiumShortName(string|int|null $value): ?string
    {
        return $this->resolveStadium($value)?->get('short_name');
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToStadiumHiraganaName(string|int|null $value): ?string
    {
        return $this->resolveStadium($value)?->get('hiragana_name');
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToStadiumKatakanaName(string|int|null $value): ?string
    {
        return $this->resolveStadium($value)?->get('katakana_name');
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToStadiumEnglishName(string|int|null $value): ?string
    {
        return $this->resolveStadium($value)?->get('english_name');
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToStadiumUrl(string|int|null $value): ?string
    {
        return $this->resolveStadium($value)?->get('url');
    }

    /**
     * @param  string|int|null  $value
     * @return \Illuminate\Support\Collection|null
     */
    private function resolveStadium(string|int|null $value): ?Collection
    {
        if (is_null($value)) {
            return null;
        }

        $value = $this->converter->convertToString($value);
        $value = Trimmer::trim($value);
        return $this->searchStadium($value);
    }

    /**
     * @param  string  $value
     * @return \Illuminate\Support\Collection|null
     */
    private function searchStadium(string $value): ?Collection
    {
        return Stadium::byId($value)
            ?? Stadium::byName($value)
            ?? Stadium::byShortName($value)
            ?? Stadium::byHiraganaName($value)
            ?? Stadium::byKatakanaName($value)
            ?? Stadium::byEnglishName($value)
            ?? Stadium::byUrl($value);
    }
}
