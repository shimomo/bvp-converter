<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

use BVP\Converter\Converters\CoreConverter;
use BVP\Converter\Converters\WindDirectionConverter;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class WindDirectionConverterTest extends TestCase
{
    /**
     * @var \BVP\Converter\Converters\WindDirectionConverter
     */
    protected WindDirectionConverter $converter;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->converter ??= new WindDirectionConverter(
            new CoreConverter()
        );
    }

    /**
     * @return void
     */
    public function testWindDirectionId(): void
    {
        $this->assertSame(4, $this->converter->windDirectionNumber(4));
        $this->assertSame(4, $this->converter->windDirectionNumber('東北東'));
        $this->assertNull($this->converter->windDirectionNumber('競艇'));
        $this->assertNull($this->converter->windDirectionNumber(null));
    }

    /**
     * @return void
     */
    public function testWindDirectionName(): void
    {
        $this->assertSame('東北東', $this->converter->windDirectionName(4));
        $this->assertSame('東北東', $this->converter->windDirectionName('東北東'));
        $this->assertNull($this->converter->windDirectionName('競艇'));
        $this->assertNull($this->converter->windDirectionName(null));
    }
}
