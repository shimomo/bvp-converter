<?php

declare(strict_types=1);

namespace BVP\Converter\Traits;

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
     * @return array
     *
     * @throws \InvalidArgumentException
     */
    private function loadConfig(string $key): array
    {
        if (isset($this->config[$key])) {
            return $this->config[$key];
        }

        $fileName = __DIR__ . '/../../config/' . $key . '.php';
        if (file_exists($fileName)) {
            return $this->config[$key] = require $fileName;
        }

        throw new \InvalidArgumentException(
            'Config file \'' . $fileName . '\' does not exist.'
        );
    }
}
