<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

use BVP\Converter\Converters\CoreConverter;
use BVP\Converter\Converters\PlaceConverter;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class PlaceConverterTest extends TestCase
{
    /**
     * @var \BVP\Converter\Converters\PlaceConverter
     */
    protected PlaceConverter $converter;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->converter ??= new PlaceConverter(
            new CoreConverter()
        );
    }

    /**
     * @return void
     */
    public function testPlaceId(): void
    {
        $this->assertSame(8, $this->converter->converterToPlaceNumber(8));
        $this->assertSame(8, $this->converter->converterToPlaceNumber('エンスト失格'));
        $this->assertSame(8, $this->converter->converterToPlaceNumber('エ'));
        $this->assertNull($this->converter->converterToPlaceNumber('競艇'));
        $this->assertNull($this->converter->converterToPlaceNumber(null));
    }

    /**
     * @return void
     */
    public function testPlaceName(): void
    {
        $this->assertSame('エンスト失格', $this->converter->converterToPlaceName(8));
        $this->assertSame('エンスト失格', $this->converter->converterToPlaceName('エンスト失格'));
        $this->assertSame('エンスト失格', $this->converter->converterToPlaceName('エ'));
        $this->assertNull($this->converter->converterToPlaceName('競艇'));
        $this->assertNull($this->converter->converterToPlaceName(null));
    }

    /**
     * @return void
     */
    public function testPlaceShortName(): void
    {
        $this->assertSame('エ', $this->converter->converterToPlaceShortName(8));
        $this->assertSame('エ', $this->converter->converterToPlaceShortName('エンスト失格'));
        $this->assertSame('エ', $this->converter->converterToPlaceShortName('エ'));
        $this->assertNull($this->converter->converterToPlaceShortName('競艇'));
        $this->assertNull($this->converter->converterToPlaceShortName(null));
    }
}
