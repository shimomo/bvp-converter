<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Traits;

use Illuminate\Support\Collection;
use InvalidArgumentException;

/**
 * @author shimomo
 */
trait ConfigLoader
{
    /**
     * @var array
     */
    private array $config = [];

    /**
     * @param  string  $key
     * @return \Illuminate\Support\Collection
     *
     * @throws \InvalidArgumentException
     */
    private function loadConfig(string $key): Collection
    {
        if (isset($this->config[$key])) {
            return $this->config[$key];
        }

        $fileName = __DIR__ . '/../../config/' . $key . '.php';
        if (file_exists($fileName)) {
            $value = require $fileName;
            $value = $this->collectRecursive($value);
            return $this->config[$key] = $value;
        }

        throw new InvalidArgumentException(
            'Config file \'' . $fileName . '\' does not exist.'
        );
    }

    /**
     * @param  object|array  $values
     * @return \Illuminate\Support\Collection
     */
    private function collectRecursive(object|array $values): Collection
    {
        return collect($values)->map(
            fn($value) => is_array($value) || is_object($value)
                ? $this->collectRecursive($value)
                : $value
        );
    }
}
