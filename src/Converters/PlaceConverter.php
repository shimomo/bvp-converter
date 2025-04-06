<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

use BVP\Converter\Traits\ConfigLoader;
use BVP\Trimmer\Trimmer;
use Shimomo\Helper\Arr;

/**
 * @author shimomo
 */
class PlaceConverter implements ConverterInterface
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
    public function convertToPlaceNumber(string|int|null $value): ?int
    {
        return $this->resolvePlace($value)['number'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToPlaceName(string|int|null $value): ?string
    {
        return $this->resolvePlace($value)['name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToPlaceShortName(string|int|null $value): ?string
    {
        return $this->resolvePlace($value)['short_name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return array|null
     */
    private function resolvePlace(string|int|null $value): ?array
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
        return $this->searchPlace($value);
    }

    /**
     * @param  string|int  $value
     * @return array|null
     */
    private function searchPlace(string|int $value): ?array
    {
        $config = $this->loadConfig('place');
        return Arr::firstWhereKeys($config, ['number', 'name', 'short_name'], $value);
    }
}
