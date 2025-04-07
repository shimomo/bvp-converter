<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

use BVP\Converter\Traits\ConfigLoader;
use BVP\Trimmer\Trimmer;
use Shimomo\Helper\Arr;

/**
 * @author shimomo
 */
abstract class BaseConverter implements BaseConverterInterface
{
    use ConfigLoader;

    /**
     * @param  \BVP\Converter\Converters\CoreConverterInterface  $converter
     * @return void
     */
    public function __construct(protected readonly CoreConverterInterface $converter) {}

    /**
     * @param  string|int|null  $value
     * @return array|null
     */
    protected function search(string|int|null $value): ?array
    {
        if (is_string($value)) {
            $value = $this->converter->convertToString($value);
        } elseif (is_int($value)) {
            $value = $this->converter->convertToInt($value);
        } else {
            return null;
        }

        return Arr::firstWhereKeys(
            $this->loadConfig($this->getConfigKey()),
            $this->getAttributeKeys(),
            Trimmer::trim($value)
        );
    }

    /**
     * @return string
     */
    protected function getConfigKey(): string
    {
        preg_match('/Converters\\\\(.+)Converter$/u', get_class($this), $matches);
        return lcfirst($matches[1]);
    }

    /**
     * @return array
     */
    protected function getAttributeKeys(): array
    {
        return ['number', 'name', 'short_name'];
    }
}
