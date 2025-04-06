<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

use BVP\Converter\Converters\CoreConverter;
use BVP\Converter\Converters\PrefectureConverter;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class PrefectureConverterTest extends TestCase
{
    /**
     * @var \BVP\Converter\Converters\PrefectureConverter
     */
    protected PrefectureConverter $converter;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->converter ??= new PrefectureConverter(
            new CoreConverter()
        );
    }

    /**
     * @return void
     */
    public function testPrefectureId(): void
    {
        $this->assertSame(13, $this->converter->convertToPrefectureNumber(13));
        $this->assertSame(13, $this->converter->convertToPrefectureNumber('東京都'));
        $this->assertSame(13, $this->converter->convertToPrefectureNumber('東京'));
        $this->assertSame(13, $this->converter->convertToPrefectureNumber('とうきょう'));
        $this->assertSame(13, $this->converter->convertToPrefectureNumber('トウキョウ'));
        $this->assertSame(13, $this->converter->convertToPrefectureNumber('tokyo'));
        $this->assertNull($this->converter->convertToPrefectureNumber('競艇'));
        $this->assertNull($this->converter->convertToPrefectureNumber(null));
    }

    /**
     * @return void
     */
    public function testPrefectureName(): void
    {
        $this->assertSame('東京都', $this->converter->convertToPrefectureName(13));
        $this->assertSame('東京都', $this->converter->convertToPrefectureName('東京都'));
        $this->assertSame('東京都', $this->converter->convertToPrefectureName('東京'));
        $this->assertSame('東京都', $this->converter->convertToPrefectureName('とうきょう'));
        $this->assertSame('東京都', $this->converter->convertToPrefectureName('トウキョウ'));
        $this->assertSame('東京都', $this->converter->convertToPrefectureName('tokyo'));
        $this->assertNull($this->converter->convertToPrefectureName('競艇'));
        $this->assertNull($this->converter->convertToPrefectureName(null));
    }

    /**
     * @return void
     */
    public function testPrefectureShortName(): void
    {
        $this->assertSame('東京', $this->converter->convertToPrefectureShortName(13));
        $this->assertSame('東京', $this->converter->convertToPrefectureShortName('東京都'));
        $this->assertSame('東京', $this->converter->convertToPrefectureShortName('東京'));
        $this->assertSame('東京', $this->converter->convertToPrefectureShortName('とうきょう'));
        $this->assertSame('東京', $this->converter->convertToPrefectureShortName('トウキョウ'));
        $this->assertSame('東京', $this->converter->convertToPrefectureShortName('tokyo'));
        $this->assertNull($this->converter->convertToPrefectureShortName('競艇'));
        $this->assertNull($this->converter->convertToPrefectureShortName(null));
    }

    /**
     * @return void
     */
    public function testPrefectureHiraganaName(): void
    {
        $this->assertSame('とうきょうと', $this->converter->convertToPrefectureHiraganaName(13));
        $this->assertSame('とうきょうと', $this->converter->convertToPrefectureHiraganaName('東京都'));
        $this->assertSame('とうきょうと', $this->converter->convertToPrefectureHiraganaName('東京'));
        $this->assertSame('とうきょうと', $this->converter->convertToPrefectureHiraganaName('とうきょう'));
        $this->assertSame('とうきょうと', $this->converter->convertToPrefectureHiraganaName('トウキョウ'));
        $this->assertSame('とうきょうと', $this->converter->convertToPrefectureHiraganaName('tokyo'));
        $this->assertNull($this->converter->convertToPrefectureHiraganaName('競艇'));
        $this->assertNull($this->converter->convertToPrefectureHiraganaName(null));
    }

    /**
     * @return void
     */
    public function testPrefectureKatakanaName(): void
    {
        $this->assertSame('トウキョウト', $this->converter->convertToPrefectureKatakanaName(13));
        $this->assertSame('トウキョウト', $this->converter->convertToPrefectureKatakanaName('東京都'));
        $this->assertSame('トウキョウト', $this->converter->convertToPrefectureKatakanaName('東京'));
        $this->assertSame('トウキョウト', $this->converter->convertToPrefectureKatakanaName('とうきょう'));
        $this->assertSame('トウキョウト', $this->converter->convertToPrefectureKatakanaName('トウキョウ'));
        $this->assertSame('トウキョウト', $this->converter->convertToPrefectureKatakanaName('tokyo'));
        $this->assertNull($this->converter->convertToPrefectureKatakanaName('競艇'));
        $this->assertNull($this->converter->convertToPrefectureKatakanaName(null));
    }

    /**
     * @return void
     */
    public function testPrefectureEnglishName(): void
    {
        $this->assertSame('tokyo', $this->converter->convertToPrefectureEnglishName(13));
        $this->assertSame('tokyo', $this->converter->convertToPrefectureEnglishName('東京都'));
        $this->assertSame('tokyo', $this->converter->convertToPrefectureEnglishName('東京'));
        $this->assertSame('tokyo', $this->converter->convertToPrefectureEnglishName('とうきょう'));
        $this->assertSame('tokyo', $this->converter->convertToPrefectureEnglishName('トウキョウ'));
        $this->assertSame('tokyo', $this->converter->convertToPrefectureEnglishName('tokyo'));
        $this->assertNull($this->converter->convertToPrefectureEnglishName('競艇'));
        $this->assertNull($this->converter->convertToPrefectureEnglishName(null));
    }
}
