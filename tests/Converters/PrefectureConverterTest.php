<?php

declare(strict_types=1);

namespace BVP\Converter\Tests\Converters;

use BVP\Converter\Converters\CoreConverter;
use BVP\Converter\Converters\PrefectureConverter;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * @author shimomo
 */
class PrefectureConverterTest extends PHPUnitTestCase
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
        $this->assertSame(13, $this->converter->prefectureId(13));
        $this->assertSame(13, $this->converter->prefectureId('東京都'));
        $this->assertSame(13, $this->converter->prefectureId('東京'));
        $this->assertSame(13, $this->converter->prefectureId('とうきょう'));
        $this->assertSame(13, $this->converter->prefectureId('トウキョウ'));
        $this->assertSame(13, $this->converter->prefectureId('tokyo'));
        $this->assertNull($this->converter->prefectureId('競艇'));
        $this->assertNull($this->converter->prefectureId(null));
    }

    /**
     * @return void
     */
    public function testPrefectureName(): void
    {
        $this->assertSame('東京都', $this->converter->prefectureName(13));
        $this->assertSame('東京都', $this->converter->prefectureName('東京都'));
        $this->assertSame('東京都', $this->converter->prefectureName('東京'));
        $this->assertSame('東京都', $this->converter->prefectureName('とうきょう'));
        $this->assertSame('東京都', $this->converter->prefectureName('トウキョウ'));
        $this->assertSame('東京都', $this->converter->prefectureName('tokyo'));
        $this->assertNull($this->converter->prefectureName('競艇'));
        $this->assertNull($this->converter->prefectureName(null));
    }

    /**
     * @return void
     */
    public function testPrefectureShortName(): void
    {
        $this->assertSame('東京', $this->converter->prefectureShortName(13));
        $this->assertSame('東京', $this->converter->prefectureShortName('東京都'));
        $this->assertSame('東京', $this->converter->prefectureShortName('東京'));
        $this->assertSame('東京', $this->converter->prefectureShortName('とうきょう'));
        $this->assertSame('東京', $this->converter->prefectureShortName('トウキョウ'));
        $this->assertSame('東京', $this->converter->prefectureShortName('tokyo'));
        $this->assertNull($this->converter->prefectureShortName('競艇'));
        $this->assertNull($this->converter->prefectureShortName(null));
    }

    /**
     * @return void
     */
    public function testPrefectureHiraganaName(): void
    {
        $this->assertSame('とうきょうと', $this->converter->prefectureHiraganaName(13));
        $this->assertSame('とうきょうと', $this->converter->prefectureHiraganaName('東京都'));
        $this->assertSame('とうきょうと', $this->converter->prefectureHiraganaName('東京'));
        $this->assertSame('とうきょうと', $this->converter->prefectureHiraganaName('とうきょう'));
        $this->assertSame('とうきょうと', $this->converter->prefectureHiraganaName('トウキョウ'));
        $this->assertSame('とうきょうと', $this->converter->prefectureHiraganaName('tokyo'));
        $this->assertNull($this->converter->prefectureHiraganaName('競艇'));
        $this->assertNull($this->converter->prefectureHiraganaName(null));
    }

    /**
     * @return void
     */
    public function testPrefectureKatakanaName(): void
    {
        $this->assertSame('トウキョウト', $this->converter->prefectureKatakanaName(13));
        $this->assertSame('トウキョウト', $this->converter->prefectureKatakanaName('東京都'));
        $this->assertSame('トウキョウト', $this->converter->prefectureKatakanaName('東京'));
        $this->assertSame('トウキョウト', $this->converter->prefectureKatakanaName('とうきょう'));
        $this->assertSame('トウキョウト', $this->converter->prefectureKatakanaName('トウキョウ'));
        $this->assertSame('トウキョウト', $this->converter->prefectureKatakanaName('tokyo'));
        $this->assertNull($this->converter->prefectureKatakanaName('競艇'));
        $this->assertNull($this->converter->prefectureKatakanaName(null));
    }

    /**
     * @return void
     */
    public function testPrefectureEnglishName(): void
    {
        $this->assertSame('tokyo', $this->converter->prefectureEnglishName(13));
        $this->assertSame('tokyo', $this->converter->prefectureEnglishName('東京都'));
        $this->assertSame('tokyo', $this->converter->prefectureEnglishName('東京'));
        $this->assertSame('tokyo', $this->converter->prefectureEnglishName('とうきょう'));
        $this->assertSame('tokyo', $this->converter->prefectureEnglishName('トウキョウ'));
        $this->assertSame('tokyo', $this->converter->prefectureEnglishName('tokyo'));
        $this->assertNull($this->converter->prefectureEnglishName('競艇'));
        $this->assertNull($this->converter->prefectureEnglishName(null));
    }
}
