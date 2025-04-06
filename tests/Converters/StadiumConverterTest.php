<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

use BVP\Converter\Converters\CoreConverter;
use BVP\Converter\Converters\StadiumConverter;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class StadiumConverterTest extends TestCase
{
    /**
     * @var \BVP\Converter\Converters\StadiumConverter
     */
    protected StadiumConverter $converter;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->converter ??= new StadiumConverter(
            new CoreConverter()
        );
    }

    /**
     * @return void
     */
    public function testStadiumId(): void
    {
        $this->assertSame(24, $this->converter->convertToStadiumNumber(24));
        $this->assertSame(24, $this->converter->convertToStadiumNumber('ボートレース大村'));
        $this->assertSame(24, $this->converter->convertToStadiumNumber('大村'));
        $this->assertSame(24, $this->converter->convertToStadiumNumber('おおむら'));
        $this->assertSame(24, $this->converter->convertToStadiumNumber('オオムラ'));
        $this->assertSame(24, $this->converter->convertToStadiumNumber('omura'));
        $this->assertNull($this->converter->convertToStadiumNumber('競艇'));
        $this->assertNull($this->converter->convertToStadiumNumber(null));
    }

    /**
     * @return void
     */
    public function testStadiumName(): void
    {
        $this->assertSame('ボートレース大村', $this->converter->convertToStadiumName(24));
        $this->assertSame('ボートレース大村', $this->converter->convertToStadiumName('ボートレース大村'));
        $this->assertSame('ボートレース大村', $this->converter->convertToStadiumName('大村'));
        $this->assertSame('ボートレース大村', $this->converter->convertToStadiumName('おおむら'));
        $this->assertSame('ボートレース大村', $this->converter->convertToStadiumName('オオムラ'));
        $this->assertSame('ボートレース大村', $this->converter->convertToStadiumName('omura'));
        $this->assertNull($this->converter->convertToStadiumName('競艇'));
        $this->assertNull($this->converter->convertToStadiumName(null));
    }

    /**
     * @return void
     */
    public function testStadiumShortName(): void
    {
        $this->assertSame('大村', $this->converter->convertToStadiumShortName(24));
        $this->assertSame('大村', $this->converter->convertToStadiumShortName('ボートレース大村'));
        $this->assertSame('大村', $this->converter->convertToStadiumShortName('大村'));
        $this->assertSame('大村', $this->converter->convertToStadiumShortName('おおむら'));
        $this->assertSame('大村', $this->converter->convertToStadiumShortName('オオムラ'));
        $this->assertSame('大村', $this->converter->convertToStadiumShortName('omura'));
        $this->assertNull($this->converter->convertToStadiumShortName('競艇'));
        $this->assertNull($this->converter->convertToStadiumShortName(null));
    }

    /**
     * @return void
     */
    public function testStadiumHiraganaName(): void
    {
        $this->assertSame('ぼーとれーすおおむら', $this->converter->stadiumHiraganaName(24));
        $this->assertSame('ぼーとれーすおおむら', $this->converter->stadiumHiraganaName('ボートレース大村'));
        $this->assertSame('ぼーとれーすおおむら', $this->converter->stadiumHiraganaName('大村'));
        $this->assertSame('ぼーとれーすおおむら', $this->converter->stadiumHiraganaName('おおむら'));
        $this->assertSame('ぼーとれーすおおむら', $this->converter->stadiumHiraganaName('オオムラ'));
        $this->assertSame('ぼーとれーすおおむら', $this->converter->stadiumHiraganaName('omura'));
        $this->assertNull($this->converter->stadiumHiraganaName('競艇'));
        $this->assertNull($this->converter->stadiumHiraganaName(null));
    }

    /**
     * @return void
     */
    public function testStadiumKatakanaName(): void
    {
        $this->assertSame('ボートレースオオムラ', $this->converter->stadiumKatakanaName(24));
        $this->assertSame('ボートレースオオムラ', $this->converter->stadiumKatakanaName('ボートレース大村'));
        $this->assertSame('ボートレースオオムラ', $this->converter->stadiumKatakanaName('大村'));
        $this->assertSame('ボートレースオオムラ', $this->converter->stadiumKatakanaName('おおむら'));
        $this->assertSame('ボートレースオオムラ', $this->converter->stadiumKatakanaName('オオムラ'));
        $this->assertSame('ボートレースオオムラ', $this->converter->stadiumKatakanaName('omura'));
        $this->assertNull($this->converter->stadiumKatakanaName('競艇'));
        $this->assertNull($this->converter->stadiumKatakanaName(null));
    }

    /**
     * @return void
     */
    public function testStadiumEnglishName(): void
    {
        $this->assertSame('omura', $this->converter->stadiumEnglishName(24));
        $this->assertSame('omura', $this->converter->stadiumEnglishName('ボートレース大村'));
        $this->assertSame('omura', $this->converter->stadiumEnglishName('大村'));
        $this->assertSame('omura', $this->converter->stadiumEnglishName('おおむら'));
        $this->assertSame('omura', $this->converter->stadiumEnglishName('オオムラ'));
        $this->assertSame('omura', $this->converter->stadiumEnglishName('omura'));
        $this->assertNull($this->converter->stadiumEnglishName('競艇'));
        $this->assertNull($this->converter->stadiumEnglishName(null));
    }
}
