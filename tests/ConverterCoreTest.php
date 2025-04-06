<?php

declare(strict_types=1);

namespace BVP\Converter\Tests;

use BVP\Converter\ConverterCore;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class ConverterCoreTest extends TestCase
{
    /**
     * @var \BVP\Converter\ConverterCore
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
    public function testString(): void
    {
        $this->assertSame('1', $this->converter->convertToString(1));
        $this->assertSame('1.2', $this->converter->convertToString(1.2));
        $this->assertSame('1', $this->converter->convertToString('１'));
        $this->assertSame('1.2', $this->converter->convertToString('１.２'));
        $this->assertSame('加藤 峻二', $this->converter->convertToString('加藤 峻二'));
        $this->assertSame('加藤 峻二', $this->converter->convertToString('加藤　峻二'));
        $this->assertNull($this->converter->convertToString(null));
    }

    /**
     * @return void
     */
    public function testFloat(): void
    {
        $this->assertSame(1, $this->converter->convertToInt(1));
        $this->assertSame(1, $this->converter->convertToInt(1.2));
        $this->assertSame(0, $this->converter->convertToInt('１'));
        $this->assertSame(0, $this->converter->convertToInt('１.２'));
        $this->assertSame(0, $this->converter->convertToInt('加藤 峻二'));
        $this->assertSame(0, $this->converter->convertToInt('加藤　峻二'));
        $this->assertNull($this->converter->convertToInt(null));
    }

    /**
     * @return void
     */
    public function testInt(): void
    {
        $this->assertSame(1.0, $this->converter->convertToFloat(1));
        $this->assertSame(1.2, $this->converter->convertToFloat(1.2));
        $this->assertSame(0.0, $this->converter->convertToFloat('１'));
        $this->assertSame(0.0, $this->converter->convertToFloat('１.２'));
        $this->assertSame(0.0, $this->converter->convertToFloat('加藤 峻二'));
        $this->assertSame(0.0, $this->converter->convertToFloat('加藤　峻二'));
        $this->assertNull($this->converter->convertToFloat(null));
    }

    /**
     * @return void
     */
    public function testName(): void
    {
        $this->assertSame('加藤 峻二', $this->converter->convertToName('加藤 峻二'));
        $this->assertSame('加藤 峻二', $this->converter->convertToName(' 加藤 峻二'));
        $this->assertSame('加藤 峻二', $this->converter->convertToName('加藤 峻二 '));
        $this->assertSame('加藤 峻二', $this->converter->convertToName('加藤　峻二'));
        $this->assertSame('加藤 峻二', $this->converter->convertToName('　加藤　峻二'));
        $this->assertSame('加藤 峻二', $this->converter->convertToName('加藤　峻二　'));
        $this->assertNull($this->converter->convertToName('加藤峻二'));
        $this->assertNull($this->converter->convertToName(null));
    }

    /**
     * @return void
     */
    public function testClassId(): void
    {
        $this->assertSame(4, $this->converter->convertToClassNumber(4));
        $this->assertSame(4, $this->converter->convertToClassNumber('B2級'));
        $this->assertSame(4, $this->converter->convertToClassNumber('B2'));
        $this->assertNull($this->converter->convertToClassNumber(-1));
        $this->assertNull($this->converter->convertToClassNumber('競艇'));
        $this->assertNull($this->converter->convertToClassNumber(null));
    }

    /**
     * @return void
     */
    public function testClassName(): void
    {
        $this->assertSame('B2級', $this->converter->convertToClassName(4));
        $this->assertSame('B2級', $this->converter->convertToClassName('B2級'));
        $this->assertSame('B2級', $this->converter->convertToClassName('B2'));
        $this->assertNull($this->converter->convertToClassName(-1));
        $this->assertNull($this->converter->convertToClassName('競艇'));
        $this->assertNull($this->converter->convertToClassName(null));
    }

    /**
     * @return void
     */
    public function testClassShortName(): void
    {
        $this->assertSame('B2', $this->converter->convertToClassShortName(4));
        $this->assertSame('B2', $this->converter->convertToClassShortName('B2級'));
        $this->assertSame('B2', $this->converter->convertToClassShortName('B2'));
        $this->assertNull($this->converter->convertToClassShortName(-1));
        $this->assertNull($this->converter->convertToClassShortName('競艇'));
        $this->assertNull($this->converter->convertToClassShortName(null));
    }

    /**
     * @return void
     */
    public function testPlaceId(): void
    {
        $this->assertSame(8, $this->converter->convertToPlaceNumber(8));
        $this->assertSame(8, $this->converter->convertToPlaceNumber('エンスト失格'));
        $this->assertSame(8, $this->converter->convertToPlaceNumber('エ'));
        $this->assertNull($this->converter->convertToPlaceName(-1));
        $this->assertNull($this->converter->convertToPlaceName('競艇'));
        $this->assertNull($this->converter->convertToPlaceName(null));
    }

    /**
     * @return void
     */
    public function testPlaceName(): void
    {
        $this->assertSame('エンスト失格', $this->converter->convertToPlaceName(8));
        $this->assertSame('エンスト失格', $this->converter->convertToPlaceName('エンスト失格'));
        $this->assertSame('エンスト失格', $this->converter->convertToPlaceName('エ'));
        $this->assertNull($this->converter->convertToPlaceName(-1));
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
        $this->assertNull($this->converter->convertToPlaceShortName(-1));
        $this->assertNull($this->converter->convertToPlaceShortName('競艇'));
        $this->assertNull($this->converter->convertToPlaceShortName(null));
    }

    /**
     * @return void
     */
    public function testTechniqueId(): void
    {
        $this->assertSame(2, $this->converter->convertToTechniqueNumber(2));
        $this->assertSame(2, $this->converter->convertToTechniqueNumber('差し'));
        $this->assertSame(2, $this->converter->convertToTechniqueNumber('差'));
        $this->assertNull($this->converter->convertToTechniqueName(-1));
        $this->assertNull($this->converter->convertToTechniqueName('競艇'));
        $this->assertNull($this->converter->convertToTechniqueName(null));
    }

    /**
     * @return void
     */
    public function testTechniqueName(): void
    {
        $this->assertSame('差し', $this->converter->convertToTechniqueName(2));
        $this->assertSame('差し', $this->converter->convertToTechniqueName('差し'));
        $this->assertSame('差し', $this->converter->convertToTechniqueName('差'));
        $this->assertNull($this->converter->convertToTechniqueName(-1));
        $this->assertNull($this->converter->convertToTechniqueName('競艇'));
        $this->assertNull($this->converter->convertToTechniqueName(null));
    }

    /**
     * @return void
     */
    public function testTechniqueShortName(): void
    {
        $this->assertSame('差', $this->converter->convertToTechniqueShortName(2));
        $this->assertSame('差', $this->converter->convertToTechniqueShortName('差し'));
        $this->assertSame('差', $this->converter->convertToTechniqueShortName('差'));
        $this->assertNull($this->converter->convertToTechniqueShortName(-1));
        $this->assertNull($this->converter->convertToTechniqueShortName('競艇'));
        $this->assertNull($this->converter->convertToTechniqueShortName(null));
    }

    /**
     * @return void
     */
    public function testWeatherId(): void
    {
        $this->assertSame(2, $this->converter->convertToWeatherNumber(2));
        $this->assertSame(2, $this->converter->convertToWeatherNumber('曇り'));
        $this->assertSame(2, $this->converter->convertToWeatherNumber('曇'));
        $this->assertNull($this->converter->convertToWeatherNumber(-1));
        $this->assertNull($this->converter->convertToWeatherNumber('競艇'));
        $this->assertNull($this->converter->convertToWeatherNumber(null));
    }

    /**
     * @return void
     */
    public function testWeatherName(): void
    {
        $this->assertSame('曇り', $this->converter->convertToWeatherName(2));
        $this->assertSame('曇り', $this->converter->convertToWeatherName('曇り'));
        $this->assertSame('曇り', $this->converter->convertToWeatherName('曇'));
        $this->assertNull($this->converter->convertToWeatherName(-1));
        $this->assertNull($this->converter->convertToWeatherName('競艇'));
        $this->assertNull($this->converter->convertToWeatherName(null));
    }

    /**
     * @return void
     */
    public function testWeatherShortName(): void
    {
        $this->assertSame('曇', $this->converter->convertToWeatherShortName(2));
        $this->assertSame('曇', $this->converter->convertToWeatherShortName('曇り'));
        $this->assertSame('曇', $this->converter->convertToWeatherShortName('曇'));
        $this->assertNull($this->converter->convertToWeatherShortName(-1));
        $this->assertNull($this->converter->convertToWeatherShortName('競艇'));
        $this->assertNull($this->converter->convertToWeatherShortName(null));
    }

    /**
     * @return void
     */
    public function testWindDirectionId(): void
    {
        $this->assertSame(4, $this->converter->convertToWindDirectionNumber(4));
        $this->assertSame(4, $this->converter->convertToWindDirectionNumber('東北東'));
        $this->assertNull($this->converter->convertToWindDirectionNumber(-1));
        $this->assertNull($this->converter->convertToWindDirectionNumber('競艇'));
        $this->assertNull($this->converter->convertToWindDirectionNumber(null));
    }

    /**
     * @return void
     */
    public function testWindDirectionName(): void
    {
        $this->assertSame('東北東', $this->converter->convertToWindDirectionName(4));
        $this->assertSame('東北東', $this->converter->convertToWindDirectionName('東北東'));
        $this->assertNull($this->converter->convertToWindDirectionName(-1));
        $this->assertNull($this->converter->convertToWindDirectionName('競艇'));
        $this->assertNull($this->converter->convertToWindDirectionName(null));
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
        $this->assertNull($this->converter->convertToPrefectureNumber(-1));
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
        $this->assertNull($this->converter->convertToPrefectureName(-1));
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
        $this->assertNull($this->converter->convertToPrefectureShortName(-1));
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
        $this->assertNull($this->converter->convertToPrefectureHiraganaName(-1));
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
        $this->assertNull($this->converter->convertToPrefectureKatakanaName(-1));
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
        $this->assertNull($this->converter->convertToPrefectureEnglishName(-1));
        $this->assertNull($this->converter->convertToPrefectureEnglishName('競艇'));
        $this->assertNull($this->converter->convertToPrefectureEnglishName(null));
    }

    /**
     * @return void
     */
    public function testStadiumId(): void
    {
        $this->assertSame(12, $this->converter->convertToStadiumNumber(12));
        $this->assertSame(12, $this->converter->convertToStadiumNumber('ボートレース住之江'));
        $this->assertSame(12, $this->converter->convertToStadiumNumber('住之江'));
        $this->assertNull($this->converter->convertToStadiumNumber(-1));
        $this->assertNull($this->converter->convertToStadiumNumber('競艇'));
        $this->assertNull($this->converter->convertToStadiumNumber(null));
    }

    /**
     * @return void
     */
    public function testStadiumName(): void
    {
        $this->assertSame('ボートレース住之江', $this->converter->convertToStadiumName(12));
        $this->assertSame('ボートレース住之江', $this->converter->convertToStadiumName('ボートレース住之江'));
        $this->assertSame('ボートレース住之江', $this->converter->convertToStadiumName('住之江'));
        $this->assertNull($this->converter->convertToStadiumName(-1));
        $this->assertNull($this->converter->convertToStadiumName('競艇'));
        $this->assertNull($this->converter->convertToStadiumName(null));
    }

    /**
     * @return void
     */
    public function testStadiumShortName(): void
    {
        $this->assertSame('住之江', $this->converter->convertToStadiumShortName(12));
        $this->assertSame('住之江', $this->converter->convertToStadiumShortName('ボートレース住之江'));
        $this->assertSame('住之江', $this->converter->convertToStadiumShortName('住之江'));
        $this->assertNull($this->converter->convertToStadiumShortName(-1));
        $this->assertNull($this->converter->convertToStadiumShortName('競艇'));
        $this->assertNull($this->converter->convertToStadiumShortName(null));
    }
}
