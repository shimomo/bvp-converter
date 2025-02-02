<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Converters;

use Boatrace\Venture\Project\Trimmer;

/**
 * @author shimomo
 */
class CoreConverter implements CoreConverterInterface
{
    /**
     * @param  string|float|int|null  $value
     * @return string|null
     */
    public function string(string|float|int|null $value): ?string
    {
        return is_null($value) ? null : mb_convert_kana((string) $value, 'KVas', 'UTF-8');
    }

    /**
     * @param  string|float|int|null  $value
     * @return float|null
     */
    public function float(string|float|int|null $value): ?float
    {
        return is_null($value) ? null : (float) $value;
    }

    /**
     * @param  string|float|int|null  $value
     * @return int|null
     */
    public function int(string|float|int|null $value): ?int
    {
        return is_null($value) ? null : (int) $value;
    }

    /**
     * @param  string|null  $value
     * @return string|null
     */
    public function name(?string $value): ?string
    {
        $value = $this->string($value);
        $value = Trimmer::trim($value);
        $pattern = '/(?:[\p{L}\p{M}\p{N}]+)\s+(?:[\p{L}\p{M}\p{N}]+)/u';
        if (preg_match($pattern, $value ?? '', $matches)) {
            return Trimmer::trim($matches[0]);
        }

        return null;
    }

    /**
     * @param  string|null  $value
     * @return int|null
     */
    public function flying(?string $value): ?int
    {
        $value = $this->string($value);
        $value = Trimmer::ltrim($value, 'F');
        return $this->int($value);
    }

    /**
     * @param  string|null  $value
     * @return int|null
     */
    public function late(?string $value): ?int
    {
        $value = $this->string($value);
        $value = Trimmer::ltrim($value, 'L');
        return $this->int($value);
    }

    /**
     * @param  string|null  $value
     * @return float|null
     */
    public function startTiming(?string $value): ?float
    {
        $value = $this->string($value);
        $value = Trimmer::trim($value);
        if (!preg_match('/(L|F\.\d{2}|0?\.\d{2})/u', $value ?? '')) {
            return null;
        }

        return match (substr($value, 0, 1)) {
            'L' => null,
            'F' => $this->float('-0' . Trimmer::ltrim($value, 'F')),
            default => $this->float('0' . $value),
        };
    }

    /**
     * @param  string|null  $value
     * @return int|null
     */
    public function wind(?string $value): ?int
    {
        $value = $this->string($value);
        $value = Trimmer::rtrim($value, 'm');
        return $this->int($value);
    }

    /**
     * @param  string|null  $value
     * @return int|null
     */
    public function windDirection(?string $value): ?int
    {
        $value = $this->string($value);
        $value = Trimmer::trim($value);
        if (preg_match('/is-wind(\d+)/u', $value ?? '', $matches)) {
            return $this->int($matches[1]);
        }

        return null;
    }

    /**
     * @param  string|null  $value
     * @return int|null
     */
    public function wave(?string $value): ?int
    {
        $value = $this->string($value);
        $value = Trimmer::rtrim($value, 'cm');
        return $this->int($value);
    }

    /**
     * @param  string|null  $value
     * @return float|null
     */
    public function temperature(?string $value): ?float
    {
        $value = $this->string($value);
        $value = Trimmer::rtrim($value, '℃');
        return $this->float($value);
    }
}
