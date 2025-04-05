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
        $this->assertSame(8, $this->converter->convertToPlaceNumber(8));
        $this->assertSame(8, $this->converter->convertToPlaceNumber('エンスト失格'));
        $this->assertSame(8, $this->converter->convertToPlaceNumber('エ'));
        $this->assertNull($this->converter->convertToPlaceNumber('競艇'));
        $this->assertNull($this->converter->convertToPlaceNumber(null));
    }

    /**
     * @return void
     */
    public function testPlaceName(): void
    {
        $this->assertSame('エンスト失格', $this->converter->convertToPlaceName(8));
        $this->assertSame('エンスト失格', $this->converter->convertToPlaceName('エンスト失格'));
        $this->assertSame('エンスト失格', $this->converter->convertToPlaceName('エ'));
        $this->assertNull($this->converter->convertToPlaceName('競艇'));
        $this->assertNull($this->converter->convertToPlaceName(null));
    }

    /**
     * @return void
     */
    public function testPlaceShortName(): void
    {
        $this->assertSame('エ', $this->converter->convertToPlaceShortName(8));
        $this->assertSame('エ', $this->converter->convertToPlaceShortName('エンスト失格'));
        $this->assertSame('エ', $this->converter->convertToPlaceShortName('エ'));
        $this->assertNull($this->converter->convertToPlaceShortName('競艇'));
        $this->assertNull($this->converter->convertToPlaceShortName(null));
    }
}
