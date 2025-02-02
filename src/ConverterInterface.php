<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project;

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
     * @param  \Boatrace\Venture\Project\ConverterCoreInterface|null  $converterCore
     * @return \Boatrace\Venture\Project\ConverterInterface
     */
    public static function getInstance(?ConverterCoreInterface $converterCore = null): ConverterInterface;

    /**
     * @param  \Boatrace\Venture\Project\ConverterCoreInterface|null  $converterCore
     * @return \Boatrace\Venture\Project\ConverterInterface
     */
    public static function createInstance(?ConverterCoreInterface $converterCore = null): ConverterInterface;

    /**
     * @return void
     */
    public static function resetInstance(): void;
}
