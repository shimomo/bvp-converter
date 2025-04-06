<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

use BVP\Converter\Traits\ConfigLoader;
use BVP\Trimmer\Trimmer;
use Shimomo\Helper\Arr;

/**
 * @author shimomo
 */
class ClassConverter implements ClassConverterInterface
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
    public function convertToClassNumber(string|int|null $value): ?int
    {
        return $this->resolveClass($value)['number'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToClassName(string|int|null $value): ?string
    {
        return $this->resolveClass($value)['name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToClassShortName(string|int|null $value): ?string
    {
        return $this->resolveClass($value)['short_name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return array|null
     */
    private function resolveClass(string|int|null $value): ?array
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
        return $this->searchClass($value);
    }

    /**
     * @param  string|int  $value
     * @return array|null
     */
    private function searchClass(string|int $value): ?array
    {
        $config = $this->loadConfig('class');
        return Arr::firstWhereKeys($config, ['number', 'name', 'short_name'], $value);
    }
}
