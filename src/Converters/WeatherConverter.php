<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
class WeatherConverter extends BaseConverter implements WeatherConverterInterface
{
    /**
     * @param  string|int|null  $value
     * @return int|null
     */
    public function convertToWeatherNumber(string|int|null $value): ?int
    {
        return $this->search($value)['number'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToWeatherName(string|int|null $value): ?string
    {
        return $this->search($value)['name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToWeatherShortName(string|int|null $value): ?string
    {
        return $this->search($value)['short_name'] ?? null;
    }
}
