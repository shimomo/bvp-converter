<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

use BVP\Converter\Traits\ConfigLoader;
use Boatrace\Venture\Project\Trimmer;
use Illuminate\Support\Collection;

/**
 * @author shimomo
 */
class ClassConverter implements ConverterInterface
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
    public function classId(string|int|null $value): ?int
    {
        return $this->resolveClass($value)?->get('id');
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function className(string|int|null $value): ?string
    {
        return $this->resolveClass($value)?->get('name');
    }

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function classShortName(string|int|null $value): ?string
    {
        return $this->resolveClass($value)?->get('short_name');
    }

    /**
     * @param  string|int|null  $value
     * @return \Illuminate\Support\Collection|null
     */
    private function resolveClass(string|int|null $value): ?Collection
    {
        if (is_null($value)) {
            return null;
        }

        $value = $this->converter->string($value);
        $value = Trimmer::trim($value);
        return $this->searchClass($value);
    }

    /**
     * @param  string  $value
     * @return \Illuminate\Support\Collection|null
     */
    private function searchClass(string $value): ?Collection
    {
        $config = $this->loadConfig('class');
        return $config->firstWhere('id', $value)
            ?? $config->firstWhere('name', $value)
            ?? $config->firstWhere('short_name', $value);
    }
}
