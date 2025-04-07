<?php

declare(strict_types=1);

namespace BVP\Converter\Converters;

/**
 * @author shimomo
 */
interface CoreParserInterface extends ConverterInterface
{
    /**
     * @param  string|null  $value
     * @return int|null
     */
    public function parseFlyingCount(?string $value): ?int;

    /**
     * @param  string|null  $value
     * @return int|null
     */
    public function parseLateCount(?string $value): ?int;

    /**
     * @param  string|null  $value
     * @return float|null
     */
    public function parseStartTiming(?string $value): ?float;

    /**
     * @param  string|null  $value
     * @return int|null
     */
    public function parseWind(?string $value): ?int;

    /**
     * @param  string|null  $value
     * @return int|null
     */
    public function parseWindDirectionNumber(?string $value): ?int;

    /**
     * @param  string|null  $value
     * @return int|null
     */
    public function parseWave(?string $value): ?int;

    /**
     * @param  string|null  $value
     * @return float|null
     */
    public function parseTemperature(?string $value): ?float;
}
