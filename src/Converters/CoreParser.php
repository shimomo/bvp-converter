<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

use BVP\Trimmer\Trimmer;

/**
 * @author shimomo
 */
class CoreParser implements CoreParserInterface
{
    /**
     * @param  \BVP\Converter\Converters\CoreConverterInterface  $converter
     * @return void
     */
    public function __construct(private readonly CoreConverterInterface $converter) {}

    /**
     * @param  string|null  $value
     * @return int|null
     */
    public function parseFlyingCount(?string $value): ?int
    {
        $value = $this->converter->convertToString($value);
        $value = Trimmer::ltrim($value, 'F');
        return $this->converter->convertToInt($value);
    }

    /**
     * @param  string|null  $value
     * @return int|null
     */
    public function parseLateCount(?string $value): ?int
    {
        $value = $this->converter->convertToString($value);
        $value = Trimmer::ltrim($value, 'L');
        return $this->converter->convertToInt($value);
    }

    /**
     * @param  string|null  $value
     * @return float|null
     */
    public function parseStartTiming(?string $value): ?float
    {
        $value = $this->converter->convertToString($value);
        $value = Trimmer::trim($value);
        if (!preg_match('/(L|F\.\d{2}|0?\.\d{2})/u', $value ?? '')) {
            return null;
        }

        return match (substr($value, 0, 1)) {
            'L' => null,
            'F' => $this->converter->convertToFloat('-0' . Trimmer::ltrim($value, 'F')),
            default => $this->converter->convertToFloat('0' . $value),
        };
    }

    /**
     * @param  string|null  $value
     * @return int|null
     */
    public function parseWind(?string $value): ?int
    {
        $value = $this->converter->convertToString($value);
        $value = Trimmer::rtrim($value, 'm');
        return $this->converter->convertToInt($value);
    }

    /**
     * @param  string|null  $value
     * @return int|null
     */
    public function parseWindDirectionNumber(?string $value): ?int
    {
        $value = $this->converter->convertToString($value);
        $value = Trimmer::trim($value);
        if (preg_match('/is-wind(\d+)/u', $value ?? '', $matches)) {
            return $this->converter->convertToInt($matches[1]);
        }

        return null;
    }

    /**
     * @param  string|null  $value
     * @return int|null
     */
    public function parseWave(?string $value): ?int
    {
        $value = $this->converter->convertToString($value);
        $value = Trimmer::rtrim($value, 'cm');
        return $this->converter->convertToInt($value);
    }

    /**
     * @param  string|null  $value
     * @return float|null
     */
    public function parseTemperature(?string $value): ?float
    {
        $value = $this->converter->convertToString($value);
        $value = Trimmer::rtrim($value, '℃');
        return $this->converter->convertToFloat($value);
    }
}
