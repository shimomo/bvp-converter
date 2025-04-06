<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
interface WeatherConverterInterface extends ConverterInterface
{
    /**
     * @param  string|int|null  $value
     * @return int|null
     */
    public function convertToWeatherNumber(string|int|null $value): ?int;

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToWeatherName(string|int|null $value): ?string;

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToWeatherShortName(string|int|null $value): ?string;
}
