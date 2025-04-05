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
        $this->assertSame(1, $this->converter->int(1));
        $this->assertSame(1, $this->converter->int(1.2));
        $this->assertSame(0, $this->converter->int('１'));
        $this->assertSame(0, $this->converter->int('１.２'));
        $this->assertSame(0, $this->converter->int('加藤 峻二'));
        $this->assertSame(0, $this->converter->int('加藤　峻二'));
        $this->assertNull($this->converter->int(null));
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
        $this->assertSame('加藤 峻二', $this->converter->name('加藤 峻二'));
        $this->assertSame('加藤 峻二', $this->converter->name(' 加藤 峻二'));
        $this->assertSame('加藤 峻二', $this->converter->name('加藤 峻二 '));
        $this->assertSame('加藤 峻二', $this->converter->name('加藤　峻二'));
        $this->assertSame('加藤 峻二', $this->converter->name('　加藤　峻二'));
        $this->assertSame('加藤 峻二', $this->converter->name('加藤　峻二　'));
        $this->assertNull($this->converter->name('加藤峻二'));
        $this->assertNull($this->converter->name(null));
    }

    /**
     * @return void
     */
    public function testFlying(): void
    {
        $this->assertSame(0, $this->converter->flying('F0'));
        $this->assertSame(1, $this->converter->flying('F1'));
        $this->assertSame(0, $this->converter->flying('F０'));
        $this->assertSame(1, $this->converter->flying('F１'));
        $this->assertNull($this->converter->flying(null));
    }

    /**
     * @return void
     */
    public function testLate(): void
    {
        $this->assertSame(0, $this->converter->late('L0'));
        $this->assertSame(1, $this->converter->late('L1'));
        $this->assertSame(0, $this->converter->late('L０'));
        $this->assertSame(1, $this->converter->late('L１'));
        $this->assertNull($this->converter->late(null));
    }

    /**
     * @return void
     */
    public function testStartTiming(): void
    {
        $this->assertSame(-0.02, $this->converter->startTiming('F.02'));
        $this->assertSame(0.02, $this->converter->startTiming('0.02'));
        $this->assertNull($this->converter->startTiming('F.2'));
        $this->assertNull($this->converter->startTiming('F'));
        $this->assertNull($this->converter->startTiming('0.2'));
        $this->assertNull($this->converter->startTiming('2'));
        $this->assertNull($this->converter->startTiming('L.02'));
        $this->assertNull($this->converter->startTiming('L.2'));
        $this->assertNull($this->converter->startTiming('L'));
        $this->assertNull($this->converter->startTiming(null));
    }

    /**
     * @return void
     */
    public function testWind(): void
    {
        $this->assertSame(2, $this->converter->wind('2m'));
        $this->assertSame(2, $this->converter->wind('2'));
        $this->assertSame(0, $this->converter->wind('m'));
        $this->assertNull($this->converter->wind(null));
    }

    /**
     * @return void
     */
    public function testWindDirection(): void
    {
        $this->assertSame(4, $this->converter->windDirection('is-wind4'));
        $this->assertNull($this->converter->windDirection('is4'));
        $this->assertNull($this->converter->windDirection('wind4'));
        $this->assertNull($this->converter->windDirection(null));
    }

    /**
     * @return void
     */
    public function testWave(): void
    {
        $this->assertSame(2, $this->converter->wave('2cm'));
        $this->assertSame(2, $this->converter->wave('2'));
        $this->assertSame(0, $this->converter->wave('cm'));
        $this->assertNull($this->converter->wave(null));
    }

    /**
     * @return void
     */
    public function testTemperature(): void
    {
        $this->assertSame(2.0, $this->converter->temperature('2.0℃'));
        $this->assertSame(2.0, $this->converter->temperature('2.0'));
        $this->assertSame(2.0, $this->converter->temperature('2℃'));
        $this->assertSame(2.0, $this->converter->temperature('2'));
        $this->assertSame(0.0, $this->converter->temperature('℃'));
        $this->assertNull($this->converter->temperature(null));
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
        $this->assertSame(8, $this->converter->converterToPlaceNumber(8));
        $this->assertSame(8, $this->converter->converterToPlaceNumber('エンスト失格'));
        $this->assertSame(8, $this->converter->converterToPlaceNumber('エ'));
        $this->assertNull($this->converter->converterToPlaceName(-1));
        $this->assertNull($this->converter->converterToPlaceName('競艇'));
        $this->assertNull($this->converter->converterToPlaceName(null));
    }

    /**
     * @return void
     */
    public function testPlaceName(): void
    {
        $this->assertSame('エンスト失格', $this->converter->converterToPlaceName(8));
        $this->assertSame('エンスト失格', $this->converter->converterToPlaceName('エンスト失格'));
        $this->assertSame('エンスト失格', $this->converter->converterToPlaceName('エ'));
        $this->assertNull($this->converter->converterToPlaceName(-1));
        $this->assertNull($this->converter->converterToPlaceName('競艇'));
        $this->assertNull($this->converter->converterToPlaceName(null));
    }

    /**
     * @return void
     */
    public function testPlaceShortName(): void
    {
        $this->assertSame('エ', $this->converter->converterToPlaceShortName(8));
        $this->assertSame('エ', $this->converter->converterToPlaceShortName('エンスト失格'));
        $this->assertSame('エ', $this->converter->converterToPlaceShortName('エ'));
        $this->assertNull($this->converter->converterToPlaceShortName(-1));
        $this->assertNull($this->converter->converterToPlaceShortName('競艇'));
        $this->assertNull($this->converter->converterToPlaceShortName(null));
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
        $this->assertSame(13, $this->converter->prefectureId(13));
        $this->assertSame(13, $this->converter->prefectureId('東京都'));
        $this->assertSame(13, $this->converter->prefectureId('東京'));
        $this->assertSame(13, $this->converter->prefectureId('とうきょう'));
        $this->assertSame(13, $this->converter->prefectureId('トウキョウ'));
        $this->assertSame(13, $this->converter->prefectureId('tokyo'));
        $this->assertNull($this->converter->prefectureId(-1));
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
        $this->assertNull($this->converter->prefectureName(-1));
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
        $this->assertNull($this->converter->prefectureShortName(-1));
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
        $this->assertNull($this->converter->prefectureHiraganaName(-1));
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
        $this->assertNull($this->converter->prefectureKatakanaName(-1));
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
        $this->assertNull($this->converter->prefectureEnglishName(-1));
        $this->assertNull($this->converter->prefectureEnglishName('競艇'));
        $this->assertNull($this->converter->prefectureEnglishName(null));
    }

    /**
     * @return void
     */
    public function testStadiumId(): void
    {
        $this->assertSame(12, $this->converter->stadiumId(12));
        $this->assertSame(12, $this->converter->stadiumId('ボートレース住之江'));
        $this->assertSame(12, $this->converter->stadiumId('住之江'));
        $this->assertNull($this->converter->stadiumId(-1));
        $this->assertNull($this->converter->stadiumId('競艇'));
        $this->assertNull($this->converter->stadiumId(null));
    }

    /**
     * @return void
     */
    public function testStadiumName(): void
    {
        $this->assertSame('ボートレース住之江', $this->converter->stadiumName(12));
        $this->assertSame('ボートレース住之江', $this->converter->stadiumName('ボートレース住之江'));
        $this->assertSame('ボートレース住之江', $this->converter->stadiumName('住之江'));
        $this->assertNull($this->converter->stadiumName(-1));
        $this->assertNull($this->converter->stadiumName('競艇'));
        $this->assertNull($this->converter->stadiumName(null));
    }

    /**
     * @return void
     */
    public function testStadiumShortName(): void
    {
        $this->assertSame('住之江', $this->converter->stadiumShortName(12));
        $this->assertSame('住之江', $this->converter->stadiumShortName('ボートレース住之江'));
        $this->assertSame('住之江', $this->converter->stadiumShortName('住之江'));
        $this->assertNull($this->converter->stadiumShortName(-1));
        $this->assertNull($this->converter->stadiumShortName('競艇'));
        $this->assertNull($this->converter->stadiumShortName(null));
    }
}
