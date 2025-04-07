<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
class WindDirectionConverter extends BaseConverter implements WindDirectionConverterInterface
{
    /**
     * @param  string|int|null  $value
     * @return int|null
     */
    public function convertToWindDirectionNumber(string|int|null $value): ?int
    {
        return $this->search($value)['number'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToWindDirectionName(string|int|null $value): ?string
    {
        return $this->search($value)['name'] ?? null;
    }

    /**
     * @return array
     */
    protected function getAttributeKeys(): array
    {
        return ['number', 'name'];
    }
}
