<?php

declare(strict_types=1);

namespace BVP\Converter;

/**
 * @author shimomo
 */
interface ConverterInterface
{
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
