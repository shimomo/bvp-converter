<?php

declare(strict_types=1);

namespace BVP\Converter;

/**
 * @author shimomo
 */
interface ConverterInterface
{
    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return string|float|int|null
     */
    public function __call(string $name, array $arguments): string|float|int|null;

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return string|float|int|null
     */
    public static function __callStatic(string $name, array $arguments): string|float|int|null;

    /**
     * @param  \BVP\Converter\ConverterCoreInterface|null  $converterCore
     * @return \BVP\Converter\ConverterInterface
     */
    public static function getInstance(?ConverterCoreInterface $converterCore = null): ConverterInterface;

    /**
     * @param  \BVP\Converter\ConverterCoreInterface|null  $converterCore
     * @return \BVP\Converter\ConverterInterface
     */
    public static function createInstance(?ConverterCoreInterface $converterCore = null): ConverterInterface;

    /**
     * @return void
     */
    public static function resetInstance(): void;
}
