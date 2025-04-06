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
        $this->assertSame(24, $this->converter->stadiumNumber(24));
        $this->assertSame(24, $this->converter->stadiumNumber('ボートレース大村'));
        $this->assertSame(24, $this->converter->stadiumNumber('大村'));
        $this->assertSame(24, $this->converter->stadiumNumber('おおむら'));
        $this->assertSame(24, $this->converter->stadiumNumber('オオムラ'));
        $this->assertSame(24, $this->converter->stadiumNumber('omura'));
        $this->assertNull($this->converter->stadiumNumber('競艇'));
        $this->assertNull($this->converter->stadiumNumber(null));
    }

    /**
     * @return void
     */
    public function testStadiumName(): void
    {
        $this->assertSame('ボートレース大村', $this->converter->stadiumName(24));
        $this->assertSame('ボートレース大村', $this->converter->stadiumName('ボートレース大村'));
        $this->assertSame('ボートレース大村', $this->converter->stadiumName('大村'));
        $this->assertSame('ボートレース大村', $this->converter->stadiumName('おおむら'));
        $this->assertSame('ボートレース大村', $this->converter->stadiumName('オオムラ'));
        $this->assertSame('ボートレース大村', $this->converter->stadiumName('omura'));
        $this->assertNull($this->converter->stadiumName('競艇'));
        $this->assertNull($this->converter->stadiumName(null));
    }

    /**
     * @return void
     */
    public function testStadiumShortName(): void
    {
        $this->assertSame('大村', $this->converter->stadiumShortName(24));
        $this->assertSame('大村', $this->converter->stadiumShortName('ボートレース大村'));
        $this->assertSame('大村', $this->converter->stadiumShortName('大村'));
        $this->assertSame('大村', $this->converter->stadiumShortName('おおむら'));
        $this->assertSame('大村', $this->converter->stadiumShortName('オオムラ'));
        $this->assertSame('大村', $this->converter->stadiumShortName('omura'));
        $this->assertNull($this->converter->stadiumShortName('競艇'));
        $this->assertNull($this->converter->stadiumShortName(null));
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
