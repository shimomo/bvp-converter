<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

use Boatrace\Venture\Project\Prefecture;
use Boatrace\Venture\Project\Trimmer;
use Illuminate\Support\Collection;

/**
 * @author shimomo
 */
class PrefectureConverter implements ConverterInterface
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
    public function prefectureId(string|int|null $value): ?int
    {
        return $this->resolvePrefecture($value)?->get('id');
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function prefectureName(string|int|null $value): ?string
    {
        return $this->resolvePrefecture($value)?->get('name');
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function prefectureShortName(string|int|null $value): ?string
    {
        return $this->resolvePrefecture($value)?->get('short_name');
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function prefectureHiraganaName(string|int|null $value): ?string
    {
        return $this->resolvePrefecture($value)?->get('hiragana_name');
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function prefectureKatakanaName(string|int|null $value): ?string
    {
        return $this->resolvePrefecture($value)?->get('katakana_name');
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function prefectureEnglishName(string|int|null $value): ?string
    {
        return $this->resolvePrefecture($value)?->get('english_name');
    }

    /**
     * @param  string|int|null  $value
     * @return \Illuminate\Support\Collection|null
     */
    private function resolvePrefecture(string|int|null $value): ?Collection
    {
        if (is_null($value)) {
            return null;
        }

        $value = $this->converter->string($value);
        $value = Trimmer::trim($value);
        return $this->searchPrefecture($value);
    }

    /**
     * @param  string  $value
     * @return \Illuminate\Support\Collection|null
     */
    private function searchPrefecture(string $value): ?Collection
    {
        return Prefecture::byId($value)
            ?? Prefecture::byName($value)
            ?? Prefecture::byShortName($value)
            ?? Prefecture::byHiraganaName($value)
            ?? Prefecture::byKatakanaName($value)
            ?? Prefecture::byEnglishName($value);
    }
}
