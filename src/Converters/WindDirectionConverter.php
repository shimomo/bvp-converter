<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

use BVP\Converter\Traits\ConfigLoader;
use BVP\Trimmer\Trimmer;
use Shimomo\Helper\Arr;

/**
 * @author shimomo
 */
class WindDirectionConverter implements WindDirectionConverterInterface
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
    public function convertToWindDirectionNumber(string|int|null $value): ?int
    {
        return $this->resolveWindDirection($value)['number'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToWindDirectionName(string|int|null $value): ?string
    {
        return $this->resolveWindDirection($value)['name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return array|null
     */
    private function resolveWindDirection(string|int|null $value): ?array
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
        return $this->searchWindDirection($value);
    }

    /**
     * @param  string|int  $value
     * @return array|null
     */
    private function searchWindDirection(string|int $value): ?array
    {
        $config = $this->loadConfig('windDirection');
        return Arr::firstWhereKeys($config, ['number', 'name'], $value);
    }
}
