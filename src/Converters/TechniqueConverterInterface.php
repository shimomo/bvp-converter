<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
interface TechniqueConverterInterface extends ConverterInterface
{
    /**
     * @param  string|int|null  $value
     * @return int|null
     */
    public function convertToTechniqueNumber(string|int|null $value): ?int;

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToTechniqueName(string|int|null $value): ?string;

    /**
     * @param  string|int|null  $value
     * @return string|null
     */
    public function convertToTechniqueShortName(string|int|null $value): ?string;
}
