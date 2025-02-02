<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests;

use BadMethodCallException;
use InvalidArgumentException;
use Boatrace\Venture\Project\ConverterCore;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * @author shimomo
 */
class ConverterCoreExceptionTest extends PHPUnitTestCase
{
    /**
     * @var \Boatrace\Venture\Project\ConverterCore
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
            'Too few arguments to function Boatrace\Venture\Project\ConverterCore::invalid(), ' .
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
            'Too many arguments to function Boatrace\Venture\Project\ConverterCore::invalid(), ' .
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
            'Call to undefined method Boatrace\Venture\Project\Converters\CoreConverter::invalid().'
        );

        $this->converter->invalid(1);
    }
}
