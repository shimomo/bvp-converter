<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests\Converters;

use Boatrace\Venture\Project\Converters\CoreConverter;
use Boatrace\Venture\Project\Converters\StadiumConverter;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * @author shimomo
 */
class StadiumConverterTest extends PHPUnitTestCase
{
    /**
     * @var \Boatrace\Venture\Project\Converters\StadiumConverter
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
        $this->assertSame(24, $this->converter->stadiumId(24));
        $this->assertSame(24, $this->converter->stadiumId('ボートレース大村'));
        $this->assertSame(24, $this->converter->stadiumId('大村'));
        $this->assertSame(24, $this->converter->stadiumId('おおむら'));
        $this->assertSame(24, $this->converter->stadiumId('オオムラ'));
        $this->assertSame(24, $this->converter->stadiumId('omura'));
        $this->assertNull($this->converter->stadiumId('競艇'));
        $this->assertNull($this->converter->stadiumId(null));
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
