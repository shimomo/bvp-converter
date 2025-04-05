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
        $this->assertSame(13, Converter::prefectureId(13));
        $this->assertSame(13, Converter::prefectureId('東京都'));
        $this->assertSame(13, Converter::prefectureId('東京'));
        $this->assertSame(13, Converter::prefectureId('とうきょう'));
        $this->assertSame(13, Converter::prefectureId('トウキョウ'));
        $this->assertSame(13, Converter::prefectureId('tokyo'));
        $this->assertNull(Converter::prefectureId(-1));
        $this->assertNull(Converter::prefectureId('競艇'));
        $this->assertNull(Converter::prefectureId(null));
    }

    /**
     * @return void
     */
    public function testPrefectureName(): void
    {
        $this->assertSame('東京都', Converter::prefectureName(13));
        $this->assertSame('東京都', Converter::prefectureName('東京都'));
        $this->assertSame('東京都', Converter::prefectureName('東京'));
        $this->assertSame('東京都', Converter::prefectureName('とうきょう'));
        $this->assertSame('東京都', Converter::prefectureName('トウキョウ'));
        $this->assertSame('東京都', Converter::prefectureName('tokyo'));
        $this->assertNull(Converter::prefectureName(-1));
        $this->assertNull(Converter::prefectureName('競艇'));
        $this->assertNull(Converter::prefectureName(null));
    }

    /**
     * @return void
     */
    public function testPrefectureShortName(): void
    {
        $this->assertSame('東京', Converter::prefectureShortName(13));
        $this->assertSame('東京', Converter::prefectureShortName('東京都'));
        $this->assertSame('東京', Converter::prefectureShortName('東京'));
        $this->assertSame('東京', Converter::prefectureShortName('とうきょう'));
        $this->assertSame('東京', Converter::prefectureShortName('トウキョウ'));
        $this->assertSame('東京', Converter::prefectureShortName('tokyo'));
        $this->assertNull(Converter::prefectureShortName(-1));
        $this->assertNull(Converter::prefectureShortName('競艇'));
        $this->assertNull(Converter::prefectureShortName(null));
    }

    /**
     * @return void
     */
    public function testPrefectureHiraganaName(): void
    {
        $this->assertSame('とうきょうと', Converter::prefectureHiraganaName(13));
        $this->assertSame('とうきょうと', Converter::prefectureHiraganaName('東京都'));
        $this->assertSame('とうきょうと', Converter::prefectureHiraganaName('東京'));
        $this->assertSame('とうきょうと', Converter::prefectureHiraganaName('とうきょう'));
        $this->assertSame('とうきょうと', Converter::prefectureHiraganaName('トウキョウ'));
        $this->assertSame('とうきょうと', Converter::prefectureHiraganaName('tokyo'));
        $this->assertNull(Converter::prefectureHiraganaName(-1));
        $this->assertNull(Converter::prefectureHiraganaName('競艇'));
        $this->assertNull(Converter::prefectureHiraganaName(null));
    }

    /**
     * @return void
     */
    public function testPrefectureKatakanaName(): void
    {
        $this->assertSame('トウキョウト', Converter::prefectureKatakanaName(13));
        $this->assertSame('トウキョウト', Converter::prefectureKatakanaName('東京都'));
        $this->assertSame('トウキョウト', Converter::prefectureKatakanaName('東京'));
        $this->assertSame('トウキョウト', Converter::prefectureKatakanaName('とうきょう'));
        $this->assertSame('トウキョウト', Converter::prefectureKatakanaName('トウキョウ'));
        $this->assertNull(Converter::prefectureKatakanaName(-1));
        $this->assertNull(Converter::prefectureKatakanaName('競艇'));
        $this->assertNull(Converter::prefectureKatakanaName(null));
    }

    /**
     * @return void
     */
    public function testPrefectureEnglishName(): void
    {
        $this->assertSame('tokyo', Converter::prefectureEnglishName(13));
        $this->assertSame('tokyo', Converter::prefectureEnglishName('東京都'));
        $this->assertSame('tokyo', Converter::prefectureEnglishName('東京'));
        $this->assertSame('tokyo', Converter::prefectureEnglishName('とうきょう'));
        $this->assertSame('tokyo', Converter::prefectureEnglishName('トウキョウ'));
        $this->assertNull(Converter::prefectureEnglishName(-1));
        $this->assertNull(Converter::prefectureEnglishName('競艇'));
        $this->assertNull(Converter::prefectureEnglishName(null));
    }

    /**
     * @return void
     */
    public function testStadiumId(): void
    {
        $this->assertSame(12, Converter::stadiumId(12));
        $this->assertSame(12, Converter::stadiumId('ボートレース住之江'));
        $this->assertSame(12, Converter::stadiumId('住之江'));
        $this->assertNull(Converter::stadiumId(-1));
        $this->assertNull(Converter::stadiumId('競艇'));
        $this->assertNull(Converter::stadiumId(null));
    }

    /**
     * @return void
     */
    public function testStadiumName(): void
    {
        $this->assertSame('ボートレース住之江', Converter::stadiumName(12));
        $this->assertSame('ボートレース住之江', Converter::stadiumName('ボートレース住之江'));
        $this->assertSame('ボートレース住之江', Converter::stadiumName('住之江'));
        $this->assertNull(Converter::stadiumName(-1));
        $this->assertNull(Converter::stadiumName('競艇'));
        $this->assertNull(Converter::stadiumName(null));
    }

    /**
     * @return void
     */
    public function testStadiumShortName(): void
    {
        $this->assertSame('住之江', Converter::stadiumShortName(12));
        $this->assertSame('住之江', Converter::stadiumShortName('ボートレース住之江'));
        $this->assertSame('住之江', Converter::stadiumShortName('住之江'));
        $this->assertNull(Converter::stadiumShortName(-1));
        $this->assertNull(Converter::stadiumShortName('競艇'));
        $this->assertNull(Converter::stadiumShortName(null));
    }
}
