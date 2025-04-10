<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

use BVP\Trimmer\Trimmer;

/**
 * @author shimomo
 */
class CoreConverter implements CoreConverterInterface
{
    /**
     * @param array
     */
    private array $names = [
        '小神野紀代子' => '小神野 紀代子',
        '堀之内紀代子' => '堀之内 紀代子',
        '大久保信一郎' => '大久保 信一郎',
        'マイケル田代' => 'マイケル 田代',
        '安河内鈴之介' => '安河内 鈴之介',
    ];

    /**
     * @param  string|float|int|null  $value
     * @return string|null
     */
    public function convertToString(string|float|int|null $value): ?string
    {
        return is_null($value) ? null : mb_convert_kana((string) $value, 'KVas', 'UTF-8');
    }

    /**
     * @param  string|float|int|null  $value
     * @return float|null
     */
    public function convertToFloat(string|float|int|null $value): ?float
    {
        return is_null($value) ? null : (float) $value;
    }

    /**
     * @param  string|float|int|null  $value
     * @return int|null
     */
    public function convertToInt(string|float|int|null $value): ?int
    {
        return is_null($value) ? null : (int) $value;
    }

    /**
     * @param  string|null  $value
     * @return string|null
     */
    public function convertToName(?string $value): ?string
    {
        $value = $this->convertToString($value);
        $value = Trimmer::trim($value);
        $pattern = '/([\p{L}\p{M}\p{N}]+)\s+([\p{L}\p{M}\p{N}]+)/u';
        if (preg_match($pattern, $value ?? '', $matches)) {
            return Trimmer::trim($matches[1] . ' ' . $matches[2]);
        }

        if (array_key_exists($value, $this->names)) {
            return $this->names[$value];
        }

        return null;
    }
}
