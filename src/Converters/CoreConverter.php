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

    /**
     * @param  string|null  $value
     * @return int|null
     */
    public function convertToFlyingCount(?string $value): ?int
    {
        $value = $this->convertToString($value);
        $value = Trimmer::ltrim($value, 'F');
        return $this->convertToInt($value);
    }

    /**
     * @param  string|null  $value
     * @return int|null
     */
    public function convertToLateCount(?string $value): ?int
    {
        $value = $this->convertToString($value);
        $value = Trimmer::ltrim($value, 'L');
        return $this->convertToInt($value);
    }

    /**
     * @param  string|null  $value
     * @return float|null
     */
    public function convertToStartTiming(?string $value): ?float
    {
        $value = $this->convertToString($value);
        $value = Trimmer::trim($value);
        if (!preg_match('/(L|F\.\d{2}|0?\.\d{2})/u', $value ?? '')) {
            return null;
        }

        return match (substr($value, 0, 1)) {
            'L' => null,
            'F' => $this->convertToFloat('-0' . Trimmer::ltrim($value, 'F')),
            default => $this->convertToFloat('0' . $value),
        };
    }

    /**
     * @param  string|null  $value
     * @return int|null
     */
    public function convertToWind(?string $value): ?int
    {
        $value = $this->convertToString($value);
        $value = Trimmer::rtrim($value, 'm');
        return $this->convertToInt($value);
    }

    /**
     * @param  string|null  $value
     * @return int|null
     */
    public function windDirection(?string $value): ?int
    {
        $value = $this->convertToString($value);
        $value = Trimmer::trim($value);
        if (preg_match('/is-wind(\d+)/u', $value ?? '', $matches)) {
            return $this->convertToInt($matches[1]);
        }

        return null;
    }

    /**
     * @param  string|null  $value
     * @return int|null
     */
    public function wave(?string $value): ?int
    {
        $value = $this->convertToString($value);
        $value = Trimmer::rtrim($value, 'cm');
        return $this->convertToInt($value);
    }

    /**
     * @param  string|null  $value
     * @return float|null
     */
    public function temperature(?string $value): ?float
    {
        $value = $this->convertToString($value);
        $value = Trimmer::rtrim($value, '℃');
        return $this->convertToFloat($value);
    }
}
