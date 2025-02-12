<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

use BVP\Converter\Traits\ConfigLoader;
use Boatrace\Venture\Project\Trimmer;
use Illuminate\Support\Collection;

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
    public function placeId(string|int|null $value): ?int
    {
        return $this->resolvePlace($value)?->get('id');
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function placeName(string|int|null $value): ?string
    {
        return $this->resolvePlace($value)?->get('name');
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function placeShortName(string|int|null $value): ?string
    {
        return $this->resolvePlace($value)?->get('short_name');
    }

    /**
     * @param  string|int|null  $value
     * @return \Illuminate\Support\Collection|null
     */
    private function resolvePlace(string|int|null $value): ?Collection
    {
        if (is_null($value)) {
            return null;
        }

        $value = $this->converter->string($value);
        $value = Trimmer::trim($value);
        return $this->searchPlace($value);
    }

    /**
     * @param  string  $value
     * @return \Illuminate\Support\Collection|null
     */
    private function searchPlace(string $value): ?Collection
    {
        $config = $this->loadConfig('place');
        return $config->firstWhere('id', $value)
            ?? $config->firstWhere('name', $value)
            ?? $config->firstWhere('short_name', $value);
    }
}
