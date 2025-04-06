<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

use BVP\Converter\Traits\ConfigLoader;
use BVP\Trimmer\Trimmer;
use Illuminate\Support\Collection;

/**
 * @author shimomo
 */
class TechniqueConverter implements TechniqueConverterInterface
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
    public function convertToTechniqueNumber(string|int|null $value): ?int
    {
        return $this->resolveTechnique($value)?->get('number');
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToTechniqueName(string|int|null $value): ?string
    {
        return $this->resolveTechnique($value)?->get('name');
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToTechniqueShortName(string|int|null $value): ?string
    {
        return $this->resolveTechnique($value)?->get('short_name');
    }

    /**
     * @param  string|int|null  $value
     * @return \Illuminate\Support\Collection|null
     */
    private function resolveTechnique(string|int|null $value): ?Collection
    {
        if (is_null($value)) {
            return null;
        }

        $value = $this->converter->convertToString($value);
        $value = Trimmer::trim($value);
        return $this->searchTechnique($value);
    }

    /**
     * @param  string  $value
     * @return \Illuminate\Support\Collection|null
     */
    private function searchTechnique(string $value): ?Collection
    {
        $config = $this->loadConfig('technique');
        return $config->firstWhere('number', $value)
            ?? $config->firstWhere('name', $value)
            ?? $config->firstWhere('short_name', $value);
    }
}
