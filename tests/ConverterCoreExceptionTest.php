<?php

declare(strict_types=1);

namespace BVP\Converter\Tests;

use BadMethodCallException;
use InvalidArgumentException;
use BVP\Converter\ConverterCore;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * @author shimomo
 */
class ConverterCoreExceptionTest extends PHPUnitTestCase
{
    /**
     * @var \BVP\Converter\ConverterCore
     */
    protected ConverterCore $converter;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->converter = new ConverterCore();
    }

    /**
     * @return void
     */
    public function testInvalidTooFewArguments(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'Too few arguments to function BVP\Converter\ConverterCore::invalid(), ' .
            '0 passed and exactly 1 expected.'
        );

        $this->converter->invalid();
    }

    /**
     * @return void
     */
    public function testInvalidTooManyArguments(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'Too many arguments to function BVP\Converter\ConverterCore::invalid(), ' .
            '2 passed and exactly 1 expected.'
        );

        $this->converter->invalid(1, 2);
    }

    /**
     * @return void
     */
    public function testInvalidUndefinedMethod(): void
    {
        $this->expectException(BadMethodCallException::class);
        $this->expectExceptionMessage(
            'Call to undefined method BVP\Converter\Converters\CoreConverter::invalid().'
        );

        $this->converter->invalid(1);
    }
}
