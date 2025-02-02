<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Converters;

use Boatrace\Venture\Project\Traits\ConfigLoader;
use Boatrace\Venture\Project\Trimmer;
use Illuminate\Support\Collection;

/**
 * @author shimomo
 */
class WindDirectionConverter implements ConverterInterface
{
    use ConfigLoader;

    /**
     * @param  \Boatrace\Venture\Project\Converters\CoreConverterInterface  $converter
     * @return void
     */
    public function __construct(private readonly CoreConverterInterface $converter) {}

    /**
     * @param  string|int|null  $value
     * @return int|null
     */
    public function windDirectionId(string|int|null $value): ?int
    {
        return $this->resolveWindDirection($value)?->get('id');
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
        return $config->firstWhere('id', $value)
            ?? $config->firstWhere('name', $value);
    }
}
