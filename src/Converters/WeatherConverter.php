<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

use BVP\Converter\Traits\ConfigLoader;
use BVP\Trimmer\Trimmer;
use Shimomo\Helper\Arr;

/**
 * @author shimomo
 */
class WeatherConverter implements WeatherConverterInterface
{
    use ConfigLoader;

    /**
     * @param  \BVP\Converter\Converters\CoreConverterInterface  $converter
     * @return void
     */
    public function __construct(private readonly CoreConverterInterface $converter) {}

    /**
     * @param  string|int|null  $value
     * @return int|null
     */
    public function convertToWeatherNumber(string|int|null $value): ?int
    {
        return $this->resolveWeather($value)['number'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToWeatherName(string|int|null $value): ?string
    {
        return $this->resolveWeather($value)['name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToWeatherShortName(string|int|null $value): ?string
    {
        return $this->resolveWeather($value)['short_name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return array|null
     */
    private function resolveWeather(string|int|null $value): ?array
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
        return $this->searchWeather($value);
    }

    /**
     * @param  string|int  $value
     * @return array|null
     */
    private function searchWeather(string|int $value): ?array
    {
        $config = $this->loadConfig('weather');
        return Arr::firstWhereKeys($config, ['number', 'name', 'short_name'], $value);
    }
}
