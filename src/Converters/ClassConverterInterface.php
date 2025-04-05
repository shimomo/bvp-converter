<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
interface ClassConverterInterface extends ConverterInterface
{
    /**
     * @param  string|int|null  $value
     * @return int|null
     */
    public function convertToClassNumber(string|int|null $value): ?int;

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToClassName(string|int|null $value): ?string;

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToClassShortName(string|int|null $value): ?string;
}
