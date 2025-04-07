<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
class PlaceConverter extends BaseConverter implements ConverterInterface
{
    /**
     * @param  string|int|null  $value
     * @return int|null
     */
    public function convertToPlaceNumber(string|int|null $value): ?int
    {
        return $this->search($value)['number'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToPlaceName(string|int|null $value): ?string
    {
        return $this->search($value)['name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToPlaceShortName(string|int|null $value): ?string
    {
        return $this->search($value)['short_name'] ?? null;
    }
}
