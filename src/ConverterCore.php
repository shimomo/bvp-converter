<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project;

use BadMethodCallException;
use InvalidArgumentException;
use Boatrace\Venture\Project\Converters\ClassConverter;
use Boatrace\Venture\Project\Converters\ConverterInterface;
use Boatrace\Venture\Project\Converters\CoreConverter;
use Boatrace\Venture\Project\Converters\PlaceConverter;
use Boatrace\Venture\Project\Converters\PrefectureConverter;
use Boatrace\Venture\Project\Converters\StadiumConverter;
use Boatrace\Venture\Project\Converters\TechniqueConverter;
use Boatrace\Venture\Project\Converters\WeatherConverter;
use Boatrace\Venture\Project\Converters\WindDirectionConverter;

/**
 * @author shimomo
 */
class ConverterCore implements ConverterCoreInterface
{
    /**
     * @var array
     */
    private array $instances = [];

    /**
     * @var array
     */
    private array $converterClasses = [
        'class' => ClassConverter::class,
        'core' => CoreConverter::class,
        'place' => PlaceConverter::class,
        'prefecture' => PrefectureConverter::class,
        'stadium' => StadiumConverter::class,
        'technique' => TechniqueConverter::class,
        'weather' => WeatherConverter::class,
        'windDirection' => WindDirectionConverter::class,
    ];

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return string|float|int|null
     *
     * @throws \InvalidArgumentException
     */
    public function __call(string $name, array $arguments): string|float|int|null
    {
        $countArguments = count($arguments);
        if ($countArguments === 1) {
            return $this->convert($name, ...$arguments);
        }

        $messageType = $countArguments === 0 ? 'few' : 'many';
        throw new InvalidArgumentException(
            'Too ' . $messageType . ' arguments to function ' . self::class . '::' . $name . '(), ' .
            $countArguments . ' passed and exactly 1 expected.'
        );
    }

    /**
     * @param  string                 $name
     * @param  string|float|int|null  $value
     * @return string|float|int|null
     *
     * @throws \BadMethodCallException
     */
    private function convert(string $name, string|float|int|null $value): string|float|int|null
    {
        $specificConverterClass = $this->resolveConverterClass($name);
        $coreConverterClass = $this->resolveConverterClass('core');

        $converterInstance = $this->getConverterInstance($specificConverterClass, $coreConverterClass);
        if (!method_exists($converterInstance, $name)) {
            throw new BadMethodCallException(
                'Call to undefined method ' . $converterInstance::class . '::' . $name . '().'
            );
        }

        return $converterInstance->$name($value);
    }

    /**
     * @param  string  $specificConverterClass
     * @param  string  $coreConverterClass
     * @return \Boatrace\Venture\Project\Converters\ConverterInterface
     */
    private function getConverterInstance(string $specificConverterClass, string $coreConverterClass): ConverterInterface
    {
        return $this->instances[$specificConverterClass] ??= $specificConverterClass === $coreConverterClass
            ? new $specificConverterClass()
            : new $specificConverterClass(new $coreConverterClass());
    }

    /**
     * @param  string  $name
     * @return string
     */
    private function resolveConverterClass(string $name): string
    {
        $filtered = array_filter($this->converterClasses, function ($key) use ($name) {
            return str_starts_with($name, $key) && $name !== $key;
        }, ARRAY_FILTER_USE_KEY);

        return array_shift($filtered) ?? $this->converterClasses['core'];
    }
}
