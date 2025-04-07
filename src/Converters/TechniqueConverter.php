<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
class TechniqueConverter extends BaseConverter implements TechniqueConverterInterface
{
    /**
     * @param  string|int|null  $value
     * @return int|null
     */
    public function convertToTechniqueNumber(string|int|null $value): ?int
    {
        return $this->search($value)['number'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToTechniqueName(string|int|null $value): ?string
    {
        return $this->search($value)['name'] ?? null;
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToTechniqueShortName(string|int|null $value): ?string
    {
        return $this->search($value)['short_name'] ?? null;
    }
}
