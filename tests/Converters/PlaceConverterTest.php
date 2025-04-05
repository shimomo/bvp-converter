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
        $this->assertSame(8, $this->converter->placeNumber(8));
        $this->assertSame(8, $this->converter->placeNumber('エンスト失格'));
        $this->assertSame(8, $this->converter->placeNumber('エ'));
        $this->assertNull($this->converter->placeNumber('競艇'));
        $this->assertNull($this->converter->placeNumber(null));
    }

    /**
     * @return void
     */
    public function testPlaceName(): void
    {
        $this->assertSame('エンスト失格', $this->converter->placeName(8));
        $this->assertSame('エンスト失格', $this->converter->placeName('エンスト失格'));
        $this->assertSame('エンスト失格', $this->converter->placeName('エ'));
        $this->assertNull($this->converter->placeName('競艇'));
        $this->assertNull($this->converter->placeName(null));
    }

    /**
     * @return void
     */
    public function testPlaceShortName(): void
    {
        $this->assertSame('エ', $this->converter->placeShortName(8));
        $this->assertSame('エ', $this->converter->placeShortName('エンスト失格'));
        $this->assertSame('エ', $this->converter->placeShortName('エ'));
        $this->assertNull($this->converter->placeShortName('競艇'));
        $this->assertNull($this->converter->placeShortName(null));
    }
}
