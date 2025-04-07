<?php

declare(strict_types=1);

namespace BVP\Converter\Tests;

use InvalidArgumentException;
use BVP\Converter\Converter;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class ConverterExceptionTest extends TestCase
{
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

        Converter::invalid();
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

        Converter::invalid(1, 2);
    }

    /**
     * @return void
     */
    public function testInvalidUndefinedMethod(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage(
            'Call to undefined method BVP\Converter\Converters\CoreConverter::invalid().'
        );

        Converter::invalid(1);
    }
}
