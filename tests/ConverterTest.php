<?php

declare(strict_types=1);

namespace BVP\Converter\Tests;

use BVP\Converter\Converter;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class ConverterTest extends TestCase
{
    /**
     * @return void
     */
    public function testString(): void
    {
        $this->assertSame('1', Converter::convertToString(1));
        $this->assertSame('1.2', Converter::convertToString(1.2));
        $this->assertSame('1', Converter::convertToString('１'));
        $this->assertSame('1.2', Converter::convertToString('１.２'));
        $this->assertSame('加藤 峻二', Converter::convertToString('加藤 峻二'));
        $this->assertSame('加藤 峻二', Converter::convertToString('加藤　峻二'));
        $this->assertNull(Converter::convertToString(null));
    }

    /**
     * @return void
     */
    public function testFloat(): void
    {
        $this->assertSame(1, Converter::convertToInt(1));
        $this->assertSame(1, Converter::convertToInt(1.2));
        $this->assertSame(0, Converter::convertToInt('１'));
        $this->assertSame(0, Converter::convertToInt('１.２'));
        $this->assertSame(0, Converter::convertToInt('加藤 峻二'));
        $this->assertSame(0, Converter::convertToInt('加藤　峻二'));
        $this->assertNull(Converter::convertToInt(null));
    }

    /**
     * @return void
     */
    public function testInt(): void
    {
        $this->assertSame(1.0, Converter::convertToFloat(1));
        $this->assertSame(1.2, Converter::convertToFloat(1.2));
        $this->assertSame(0.0, Converter::convertToFloat('１'));
        $this->assertSame(0.0, Converter::convertToFloat('１.２'));
        $this->assertSame(0.0, Converter::convertToFloat('加藤 峻二'));
        $this->assertSame(0.0, Converter::convertToFloat('加藤　峻二'));
        $this->assertNull(Converter::convertToFloat(null));
    }

    /**
     * @return void
     */
    public function testName(): void
    {
        $this->assertSame('加藤 峻二', Converter::convertToName('加藤 峻二'));
        $this->assertSame('加藤 峻二', Converter::convertToName(' 加藤 峻二'));
        $this->assertSame('加藤 峻二', Converter::convertToName('加藤 峻二 '));
        $this->assertSame('加藤 峻二', Converter::convertToName('加藤　峻二'));
        $this->assertSame('加藤 峻二', Converter::convertToName('　加藤　峻二'));
        $this->assertSame('加藤 峻二', Converter::convertToName('加藤　峻二　'));
        $this->assertNull(Converter::convertToName('加藤峻二'));
        $this->assertNull(Converter::convertToName(null));
    }

    /**
     * @return void
     */
    public function testClassId(): void
    {
        $this->assertSame(4, Converter::convertToClassNumber(4));
        $this->assertSame(4, Converter::convertToClassNumber('B2級'));
        $this->assertSame(4, Converter::convertToClassNumber('B2'));
        $this->assertNull(Converter::convertToClassNumber(-1));
        $this->assertNull(Converter::convertToClassNumber('競艇'));
        $this->assertNull(Converter::convertToClassNumber(null));
    }

    /**
     * @return void
     */
    public function testClassName(): void
    {
        $this->assertSame('B2級', Converter::convertToClassName(4));
        $this->assertSame('B2級', Converter::convertToClassName('B2級'));
        $this->assertSame('B2級', Converter::convertToClassName('B2'));
        $this->assertNull(Converter::convertToClassName(-1));
        $this->assertNull(Converter::convertToClassName('競艇'));
        $this->assertNull(Converter::convertToClassName(null));
    }

    /**
     * @return void
     */
    public function testClassShortName(): void
    {
        $this->assertSame('B2', Converter::convertToClassShortName(4));
        $this->assertSame('B2', Converter::convertToClassShortName('B2級'));
        $this->assertSame('B2', Converter::convertToClassShortName('B2'));
        $this->assertNull(Converter::convertToClassShortName(-1));
        $this->assertNull(Converter::convertToClassShortName('競艇'));
        $this->assertNull(Converter::convertToClassShortName(null));
    }

    /**
     * @return void
     */
    public function testPlaceId(): void
    {
        $this->assertSame(8, Converter::convertToPlaceNumber(8));
        $this->assertSame(8, Converter::convertToPlaceNumber('エンスト失格'));
        $this->assertSame(8, Converter::convertToPlaceNumber('エ'));
        $this->assertNull(Converter::convertToPlaceName(-1));
        $this->assertNull(Converter::convertToPlaceName('競艇'));
        $this->assertNull(Converter::convertToPlaceName(null));
    }

    /**
     * @return void
     */
    public function testPlaceName(): void
    {
        $this->assertSame('エンスト失格', Converter::convertToPlaceName(8));
        $this->assertSame('エンスト失格', Converter::convertToPlaceName('エンスト失格'));
        $this->assertSame('エンスト失格', Converter::convertToPlaceName('エ'));
        $this->assertNull(Converter::convertToPlaceName(-1));
        $this->assertNull(Converter::convertToPlaceName('競艇'));
        $this->assertNull(Converter::convertToPlaceName(null));
    }

    /**
     * @return void
     */
    public function testPlaceShortName(): void
    {
        $this->assertSame('エ', Converter::convertToPlaceShortName(8));
        $this->assertSame('エ', Converter::convertToPlaceShortName('エンスト失格'));
        $this->assertSame('エ', Converter::convertToPlaceShortName('エ'));
        $this->assertNull(Converter::convertToPlaceShortName(-1));
        $this->assertNull(Converter::convertToPlaceShortName('競艇'));
        $this->assertNull(Converter::convertToPlaceShortName(null));
    }

    /**
     * @return void
     */
    public function testTechniqueId(): void
    {
        $this->assertSame(2, Converter::convertToTechniqueNumber(2));
        $this->assertSame(2, Converter::convertToTechniqueNumber('差し'));
        $this->assertSame(2, Converter::convertToTechniqueNumber('差'));
        $this->assertNull(Converter::convertToTechniqueName(-1));
        $this->assertNull(Converter::convertToTechniqueName('競艇'));
        $this->assertNull(Converter::convertToTechniqueName(null));
    }

    /**
     * @return void
     */
    public function testTechniqueName(): void
    {
        $this->assertSame('差し', Converter::convertToTechniqueName(2));
        $this->assertSame('差し', Converter::convertToTechniqueName('差し'));
        $this->assertSame('差し', Converter::convertToTechniqueName('差'));
        $this->assertNull(Converter::convertToTechniqueName(-1));
        $this->assertNull(Converter::convertToTechniqueName('競艇'));
        $this->assertNull(Converter::convertToTechniqueName(null));
    }

    /**
     * @return void
     */
    public function testTechniqueShortName(): void
    {
        $this->assertSame('差', Converter::convertToTechniqueShortName(2));
        $this->assertSame('差', Converter::convertToTechniqueShortName('差し'));
        $this->assertSame('差', Converter::convertToTechniqueShortName('差'));
        $this->assertNull(Converter::convertToTechniqueShortName(-1));
        $this->assertNull(Converter::convertToTechniqueShortName('競艇'));
        $this->assertNull(Converter::convertToTechniqueShortName(null));
    }

    /**
     * @return void
     */
    public function testWeatherId(): void
    {
        $this->assertSame(2, Converter::convertToWeatherNumber(2));
        $this->assertSame(2, Converter::convertToWeatherNumber('曇り'));
        $this->assertSame(2, Converter::convertToWeatherNumber('曇'));
        $this->assertNull(Converter::convertToWeatherNumber(-1));
        $this->assertNull(Converter::convertToWeatherNumber('競艇'));
        $this->assertNull(Converter::convertToWeatherNumber(null));
    }

    /**
     * @return void
     */
    public function testWeatherName(): void
    {
        $this->assertSame('曇り', Converter::convertToWeatherName(2));
        $this->assertSame('曇り', Converter::convertToWeatherName('曇り'));
        $this->assertSame('曇り', Converter::convertToWeatherName('曇'));
        $this->assertNull(Converter::convertToWeatherName(-1));
        $this->assertNull(Converter::convertToWeatherName('競艇'));
        $this->assertNull(Converter::convertToWeatherName(null));
    }

    /**
     * @return void
     */
    public function testWeatherShortName(): void
    {
        $this->assertSame('曇', Converter::convertToWeatherShortName(2));
        $this->assertSame('曇', Converter::convertToWeatherShortName('曇り'));
        $this->assertSame('曇', Converter::convertToWeatherShortName('曇'));
        $this->assertNull(Converter::convertToWeatherShortName(-1));
        $this->assertNull(Converter::convertToWeatherShortName('競艇'));
        $this->assertNull(Converter::convertToWeatherShortName(null));
    }

    /**
     * @return void
     */
    public function testWindDirectionId(): void
    {
        $this->assertSame(4, Converter::convertToWindDirectionNumber(4));
        $this->assertSame(4, Converter::convertToWindDirectionNumber('東北東'));
        $this->assertNull(Converter::convertToWindDirectionNumber(-1));
        $this->assertNull(Converter::convertToWindDirectionNumber('競艇'));
        $this->assertNull(Converter::convertToWindDirectionNumber(null));
    }

    /**
     * @return void
     */
    public function testWindDirectionName(): void
    {
        $this->assertSame('東北東', Converter::convertToWindDirectionName(4));
        $this->assertSame('東北東', Converter::convertToWindDirectionName('東北東'));
        $this->assertNull(Converter::convertToWindDirectionName(-1));
        $this->assertNull(Converter::convertToWindDirectionName('競艇'));
        $this->assertNull(Converter::convertToWindDirectionName(null));
    }

    /**
     * @return void
     */
    public function testPrefectureId(): void
    {
        $this->assertSame(13, Converter::convertToPrefectureNumber(13));
        $this->assertSame(13, Converter::convertToPrefectureNumber('東京都'));
        $this->assertSame(13, Converter::convertToPrefectureNumber('東京'));
        $this->assertSame(13, Converter::convertToPrefectureNumber('とうきょう'));
        $this->assertSame(13, Converter::convertToPrefectureNumber('トウキョウ'));
        $this->assertSame(13, Converter::convertToPrefectureNumber('tokyo'));
        $this->assertNull(Converter::convertToPrefectureNumber(-1));
        $this->assertNull(Converter::convertToPrefectureNumber('競艇'));
        $this->assertNull(Converter::convertToPrefectureNumber(null));
    }

    /**
     * @return void
     */
    public function testPrefectureName(): void
    {
        $this->assertSame('東京都', Converter::convertToPrefectureName(13));
        $this->assertSame('東京都', Converter::convertToPrefectureName('東京都'));
        $this->assertSame('東京都', Converter::convertToPrefectureName('東京'));
        $this->assertSame('東京都', Converter::convertToPrefectureName('とうきょう'));
        $this->assertSame('東京都', Converter::convertToPrefectureName('トウキョウ'));
        $this->assertSame('東京都', Converter::convertToPrefectureName('tokyo'));
        $this->assertNull(Converter::convertToPrefectureName(-1));
        $this->assertNull(Converter::convertToPrefectureName('競艇'));
        $this->assertNull(Converter::convertToPrefectureName(null));
    }

    /**
     * @return void
     */
    public function testPrefectureShortName(): void
    {
        $this->assertSame('東京', Converter::convertToPrefectureShortName(13));
        $this->assertSame('東京', Converter::convertToPrefectureShortName('東京都'));
        $this->assertSame('東京', Converter::convertToPrefectureShortName('東京'));
        $this->assertSame('東京', Converter::convertToPrefectureShortName('とうきょう'));
        $this->assertSame('東京', Converter::convertToPrefectureShortName('トウキョウ'));
        $this->assertSame('東京', Converter::convertToPrefectureShortName('tokyo'));
        $this->assertNull(Converter::convertToPrefectureShortName(-1));
        $this->assertNull(Converter::convertToPrefectureShortName('競艇'));
        $this->assertNull(Converter::convertToPrefectureShortName(null));
    }

    /**
     * @return void
     */
    public function testPrefectureHiraganaName(): void
    {
        $this->assertSame('とうきょうと', Converter::convertToPrefectureHiraganaName(13));
        $this->assertSame('とうきょうと', Converter::convertToPrefectureHiraganaName('東京都'));
        $this->assertSame('とうきょうと', Converter::convertToPrefectureHiraganaName('東京'));
        $this->assertSame('とうきょうと', Converter::convertToPrefectureHiraganaName('とうきょう'));
        $this->assertSame('とうきょうと', Converter::convertToPrefectureHiraganaName('トウキョウ'));
        $this->assertSame('とうきょうと', Converter::convertToPrefectureHiraganaName('tokyo'));
        $this->assertNull(Converter::convertToPrefectureHiraganaName(-1));
        $this->assertNull(Converter::convertToPrefectureHiraganaName('競艇'));
        $this->assertNull(Converter::convertToPrefectureHiraganaName(null));
    }

    /**
     * @return void
     */
    public function testPrefectureKatakanaName(): void
    {
        $this->assertSame('トウキョウト', Converter::convertToPrefectureKatakanaName(13));
        $this->assertSame('トウキョウト', Converter::convertToPrefectureKatakanaName('東京都'));
        $this->assertSame('トウキョウト', Converter::convertToPrefectureKatakanaName('東京'));
        $this->assertSame('トウキョウト', Converter::convertToPrefectureKatakanaName('とうきょう'));
        $this->assertSame('トウキョウト', Converter::convertToPrefectureKatakanaName('トウキョウ'));
        $this->assertNull(Converter::convertToPrefectureKatakanaName(-1));
        $this->assertNull(Converter::convertToPrefectureKatakanaName('競艇'));
        $this->assertNull(Converter::convertToPrefectureKatakanaName(null));
    }

    /**
     * @return void
     */
    public function testPrefectureEnglishName(): void
    {
        $this->assertSame('tokyo', Converter::convertToPrefectureEnglishName(13));
        $this->assertSame('tokyo', Converter::convertToPrefectureEnglishName('東京都'));
        $this->assertSame('tokyo', Converter::convertToPrefectureEnglishName('東京'));
        $this->assertSame('tokyo', Converter::convertToPrefectureEnglishName('とうきょう'));
        $this->assertSame('tokyo', Converter::convertToPrefectureEnglishName('トウキョウ'));
        $this->assertNull(Converter::convertToPrefectureEnglishName(-1));
        $this->assertNull(Converter::convertToPrefectureEnglishName('競艇'));
        $this->assertNull(Converter::convertToPrefectureEnglishName(null));
    }

    /**
     * @return void
     */
    public function testStadiumId(): void
    {
        $this->assertSame(12, Converter::convertToStadiumNumber(12));
        $this->assertSame(12, Converter::convertToStadiumNumber('ボートレース住之江'));
        $this->assertSame(12, Converter::convertToStadiumNumber('住之江'));
        $this->assertNull(Converter::convertToStadiumNumber(-1));
        $this->assertNull(Converter::convertToStadiumNumber('競艇'));
        $this->assertNull(Converter::convertToStadiumNumber(null));
    }

    /**
     * @return void
     */
    public function testStadiumName(): void
    {
        $this->assertSame('ボートレース住之江', Converter::convertToStadiumName(12));
        $this->assertSame('ボートレース住之江', Converter::convertToStadiumName('ボートレース住之江'));
        $this->assertSame('ボートレース住之江', Converter::convertToStadiumName('住之江'));
        $this->assertNull(Converter::convertToStadiumName(-1));
        $this->assertNull(Converter::convertToStadiumName('競艇'));
        $this->assertNull(Converter::convertToStadiumName(null));
    }

    /**
     * @return void
     */
    public function testStadiumShortName(): void
    {
        $this->assertSame('住之江', Converter::convertToStadiumShortName(12));
        $this->assertSame('住之江', Converter::convertToStadiumShortName('ボートレース住之江'));
        $this->assertSame('住之江', Converter::convertToStadiumShortName('住之江'));
        $this->assertNull(Converter::convertToStadiumShortName(-1));
        $this->assertNull(Converter::convertToStadiumShortName('競艇'));
        $this->assertNull(Converter::convertToStadiumShortName(null));
    }
}
