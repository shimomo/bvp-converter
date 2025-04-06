<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
interface WindDirectionConverterInterface extends ConverterInterface
{
    /**
     * @param  string|int|null  $value
     * @return int|null
     */
    public function convertToWindDirectionNumber(string|int|null $value): ?int;

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToWindDirectionName(string|int|null $value): ?string;
}
