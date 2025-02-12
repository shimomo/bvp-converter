<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project;

/**
 * @author shimomo
 */
class Converter implements ConverterInterface
{
    /**
     * @var \Boatrace\Venture\Project\ConverterInterface|null
     */
    private static ?ConverterInterface $instance;

    /**
     * @param  \Boatrace\Venture\Project\ConverterCoreInterface  $converter
     * @return void
     */
    public function __construct(private readonly ConverterCoreInterface $converter) {}

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return string|float|int|null
     */
    public function __call(string $name, array $arguments): string|float|int|null
    {
        return $this->converter->$name(...$arguments);
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return string|float|int|null
     */
    public static function __callStatic(string $name, array $arguments): string|float|int|null
    {
        return self::getInstance()->$name(...$arguments);
    }

    /**
     * @param  \Boatrace\Venture\Project\ConverterCoreInterface|null  $converterCore
     * @return \Boatrace\Venture\Project\ConverterInterface
     */
    public static function getInstance(?ConverterCoreInterface $converterCore = null): ConverterInterface
    {
        return self::$instance ??= new self($converterCore ?? new ConverterCore());
    }

    /**
     * @param  \Boatrace\Venture\Project\ConverterCoreInterface|null  $converterCore
     * @return \Boatrace\Venture\Project\ConverterInterface
     */
    public static function createInstance(?ConverterCoreInterface $converterCore = null): ConverterInterface
    {
        return self::$instance = new self($converterCore ?? new ConverterCore());
    }

    /**
     * @return void
     */
    public static function resetInstance(): void
    {
        self::$instance = null;
    }
}
