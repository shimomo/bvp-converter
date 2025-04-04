<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

use BVP\Converter\Traits\ConfigLoader;
use BVP\Trimmer\Trimmer;
use Illuminate\Support\Collection;

/**
 * @author shimomo
 */
class WindDirectionConverter implements ConverterInterface
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
    public function windDirectionId(string|int|null $value): ?int
    {
        return $this->resolveWindDirection($value)?->get('number');
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function windDirectionName(string|int|null $value): ?string
    {
        return $this->resolveWindDirection($value)?->get('name');
    }

    /**
     * @param  string|int|null  $value
     * @return \Illuminate\Support\Collection|null
     */
    private function resolveWindDirection(string|int|null $value): ?Collection
    {
        if (is_null($value)) {
            return null;
        }

        $value = $this->converter->string($value);
        $value = Trimmer::trim($value);
        return $this->searchWindDirection($value);
    }

    /**
     * @param  string  $value
     * @return \Illuminate\Support\Collection|null
     */
    private function searchWindDirection(string $value): ?Collection
    {
        $config = $this->loadConfig('windDirection');
        return $config->firstWhere('number', $value)
            ?? $config->firstWhere('name', $value);
    }
}
