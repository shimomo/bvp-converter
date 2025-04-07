<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
class ClassConverter extends BaseConverter implements ClassConverterInterface
{
    /**
     * @param  string|int|null  $value
     * @return int|null
     */
    public function convertToClassNumber(string|int|null $value): ?int
    {
        return $this->search($value)['number'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToClassName(string|int|null $value): ?string
    {
        return $this->search($value)['name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToClassShortName(string|int|null $value): ?string
    {
        return $this->search($value)['short_name'] ?? null;
    }
}
