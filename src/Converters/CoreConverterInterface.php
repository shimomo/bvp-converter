<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
interface CoreConverterInterface extends ConverterInterface
{
    /**
     * @param  string|float|int|null  $value
     * @return string|null
     */
    public function convertToString(string|float|int|null $value): ?string;

    /**
     * @param  string|float|int|null  $value
     * @return float|null
     */
    public function convertToFloat(string|float|int|null $value): ?float;
    /**
     * @param  string|float|int|null  $value
     * @return int|null
     */
    public function convertToInt(string|float|int|null $value): ?int;
}
