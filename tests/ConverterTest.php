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
        $this->assertSame('1', Converter::string(1));
        $this->assertSame('1.2', Converter::string(1.2));
        $this->assertSame('1', Converter::string('１'));
        $this->assertSame('1.2', Converter::string('１.２'));
        $this->assertSame('加藤 峻二', Converter::string('加藤 峻二'));
        $this->assertSame('加藤 峻二', Converter::string('加藤　峻二'));
        $this->assertNull(Converter::string(null));
    }

    /**
     * @return void
     */
    public function testFloat(): void
    {
        $this->assertSame(1, Converter::int(1));
        $this->assertSame(1, Converter::int(1.2));
        $this->assertSame(0, Converter::int('１'));
        $this->assertSame(0, Converter::int('１.２'));
        $this->assertSame(0, Converter::int('加藤 峻二'));
        $this->assertSame(0, Converter::int('加藤　峻二'));
        $this->assertNull(Converter::int(null));
    }

    /**
     * @return void
     */
    public function testInt(): void
    {
        $this->assertSame(1.0, Converter::float(1));
        $this->assertSame(1.2, Converter::float(1.2));
        $this->assertSame(0.0, Converter::float('１'));
        $this->assertSame(0.0, Converter::float('１.２'));
        $this->assertSame(0.0, Converter::float('加藤 峻二'));
        $this->assertSame(0.0, Converter::float('加藤　峻二'));
        $this->assertNull(Converter::float(null));
    }

    /**
     * @return void
     */
    public function testName(): void
    {
        $this->assertSame('加藤 峻二', Converter::name('加藤 峻二'));
        $this->assertSame('加藤 峻二', Converter::name(' 加藤 峻二'));
        $this->assertSame('加藤 峻二', Converter::name('加藤 峻二 '));
        $this->assertSame('加藤 峻二', Converter::name('加藤　峻二'));
        $this->assertSame('加藤 峻二', Converter::name('　加藤　峻二'));
        $this->assertSame('加藤 峻二', Converter::name('加藤　峻二　'));
        $this->assertNull(Converter::name('加藤峻二'));
        $this->assertNull(Converter::name(null));
    }

    /**
     * @return void
     */
    public function testFlying(): void
    {
        $this->assertSame(0, Converter::flying('F0'));
        $this->assertSame(1, Converter::flying('F1'));
        $this->assertSame(0, Converter::flying('F０'));
        $this->assertSame(1, Converter::flying('F１'));
        $this->assertNull(Converter::flying(null));
    }

    /**
     * @return void
     */
    public function testLate(): void
    {
        $this->assertSame(0, Converter::late('L0'));
        $this->assertSame(1, Converter::late('L1'));
        $this->assertSame(0, Converter::late('L０'));
        $this->assertSame(1, Converter::late('L１'));
        $this->assertNull(Converter::late(null));
    }

    /**
     * @return void
     */
    public function testStartTiming(): void
    {
        $this->assertSame(-0.02, Converter::startTiming('F.02'));
        $this->assertSame(0.02, Converter::startTiming('0.02'));
        $this->assertNull(Converter::startTiming('F.2'));
        $this->assertNull(Converter::startTiming('F'));
        $this->assertNull(Converter::startTiming('0.2'));
        $this->assertNull(Converter::startTiming('2'));
        $this->assertNull(Converter::startTiming('L.02'));
        $this->assertNull(Converter::startTiming('L.2'));
        $this->assertNull(Converter::startTiming('L'));
        $this->assertNull(Converter::startTiming(null));
    }

    /**
     * @return void
     */
    public function testWind(): void
    {
        $this->assertSame(2, Converter::wind('2m'));
        $this->assertSame(2, Converter::wind('2'));
        $this->assertSame(0, Converter::wind('m'));
        $this->assertNull(Converter::wind(null));
    }

    /**
     * @return void
     */
    public function testWindDirection(): void
    {
        $this->assertSame(4, Converter::windDirection('is-wind4'));
        $this->assertNull(Converter::windDirection('is4'));
        $this->assertNull(Converter::windDirection('wind4'));
        $this->assertNull(Converter::windDirection(null));
    }

    /**
     * @return void
     */
    public function testWave(): void
    {
        $this->assertSame(2, Converter::wave('2cm'));
        $this->assertSame(2, Converter::wave('2'));
        $this->assertSame(0, Converter::wave('cm'));
        $this->assertNull(Converter::wave(null));
    }

    /**
     * @return void
     */
    public function testTemperature(): void
    {
        $this->assertSame(2.0, Converter::temperature('2.0℃'));
        $this->assertSame(2.0, Converter::temperature('2.0'));
        $this->assertSame(2.0, Converter::temperature('2℃'));
        $this->assertSame(2.0, Converter::temperature('2'));
        $this->assertSame(0.0, Converter::temperature('℃'));
        $this->assertNull(Converter::temperature(null));
    }

    /**
     * @return void
     */
    public function testClassId(): void
    {
        $this->assertSame(4, Converter::classId(4));
        $this->assertSame(4, Converter::classId('B2級'));
        $this->assertSame(4, Converter::classId('B2'));
        $this->assertNull(Converter::classId(-1));
        $this->assertNull(Converter::classId('競艇'));
        $this->assertNull(Converter::classId(null));
    }

    /**
     * @return void
     */
    public function testClassName(): void
    {
        $this->assertSame('B2級', Converter::className(4));
        $this->assertSame('B2級', Converter::className('B2級'));
        $this->assertSame('B2級', Converter::className('B2'));
        $this->assertNull(Converter::className(-1));
        $this->assertNull(Converter::className('競艇'));
        $this->assertNull(Converter::className(null));
    }

    /**
     * @return void
     */
    public function testClassShortName(): void
    {
        $this->assertSame('B2', Converter::classShortName(4));
        $this->assertSame('B2', Converter::classShortName('B2級'));
        $this->assertSame('B2', Converter::classShortName('B2'));
        $this->assertNull(Converter::classShortName(-1));
        $this->assertNull(Converter::classShortName('競艇'));
        $this->assertNull(Converter::classShortName(null));
    }

    /**
     * @return void
     */
    public function testPlaceId(): void
    {
        $this->assertSame(8, Converter::placeId(8));
        $this->assertSame(8, Converter::placeId('エンスト失格'));
        $this->assertSame(8, Converter::placeId('エ'));
        $this->assertNull(Converter::placeName(-1));
        $this->assertNull(Converter::placeName('競艇'));
        $this->assertNull(Converter::placeName(null));
    }

    /**
     * @return void
     */
    public function testPlaceName(): void
    {
        $this->assertSame('エンスト失格', Converter::placeName(8));
        $this->assertSame('エンスト失格', Converter::placeName('エンスト失格'));
        $this->assertSame('エンスト失格', Converter::placeName('エ'));
        $this->assertNull(Converter::placeName(-1));
        $this->assertNull(Converter::placeName('競艇'));
        $this->assertNull(Converter::placeName(null));
    }

    /**
     * @return void
     */
    public function testPlaceShortName(): void
    {
        $this->assertSame('エ', Converter::placeShortName(8));
        $this->assertSame('エ', Converter::placeShortName('エンスト失格'));
        $this->assertSame('エ', Converter::placeShortName('エ'));
        $this->assertNull(Converter::placeShortName(-1));
        $this->assertNull(Converter::placeShortName('競艇'));
        $this->assertNull(Converter::placeShortName(null));
    }

    /**
     * @return void
     */
    public function testTechniqueId(): void
    {
        $this->assertSame(2, Converter::techniqueId(2));
        $this->assertSame(2, Converter::techniqueId('差し'));
        $this->assertSame(2, Converter::techniqueId('差'));
        $this->assertNull(Converter::techniqueName(-1));
        $this->assertNull(Converter::techniqueName('競艇'));
        $this->assertNull(Converter::techniqueName(null));
    }

    /**
     * @return void
     */
    public function testTechniqueName(): void
    {
        $this->assertSame('差し', Converter::techniqueName(2));
        $this->assertSame('差し', Converter::techniqueName('差し'));
        $this->assertSame('差し', Converter::techniqueName('差'));
        $this->assertNull(Converter::techniqueName(-1));
        $this->assertNull(Converter::techniqueName('競艇'));
        $this->assertNull(Converter::techniqueName(null));
    }

    /**
     * @return void
     */
    public function testTechniqueShortName(): void
    {
        $this->assertSame('差', Converter::techniqueShortName(2));
        $this->assertSame('差', Converter::techniqueShortName('差し'));
        $this->assertSame('差', Converter::techniqueShortName('差'));
        $this->assertNull(Converter::techniqueShortName(-1));
        $this->assertNull(Converter::techniqueShortName('競艇'));
        $this->assertNull(Converter::techniqueShortName(null));
    }

    /**
     * @return void
     */
    public function testWeatherId(): void
    {
        $this->assertSame(2, Converter::weatherId(2));
        $this->assertSame(2, Converter::weatherId('曇り'));
        $this->assertSame(2, Converter::weatherId('曇'));
        $this->assertNull(Converter::weatherId(-1));
        $this->assertNull(Converter::weatherId('競艇'));
        $this->assertNull(Converter::weatherId(null));
    }

    /**
     * @return void
     */
    public function testWeatherName(): void
    {
        $this->assertSame('曇り', Converter::weatherName(2));
        $this->assertSame('曇り', Converter::weatherName('曇り'));
        $this->assertSame('曇り', Converter::weatherName('曇'));
        $this->assertNull(Converter::weatherName(-1));
        $this->assertNull(Converter::weatherName('競艇'));
        $this->assertNull(Converter::weatherName(null));
    }

    /**
     * @return void
     */
    public function testWeatherShortName(): void
    {
        $this->assertSame('曇', Converter::weatherShortName(2));
        $this->assertSame('曇', Converter::weatherShortName('曇り'));
        $this->assertSame('曇', Converter::weatherShortName('曇'));
        $this->assertNull(Converter::weatherShortName(-1));
        $this->assertNull(Converter::weatherShortName('競艇'));
        $this->assertNull(Converter::weatherShortName(null));
    }

    /**
     * @return void
     */
    public function testWindDirectionId(): void
    {
        $this->assertSame(4, Converter::windDirectionId(4));
        $this->assertSame(4, Converter::windDirectionId('東北東'));
        $this->assertNull(Converter::windDirectionId(-1));
        $this->assertNull(Converter::windDirectionId('競艇'));
        $this->assertNull(Converter::windDirectionId(null));
    }

    /**
     * @return void
     */
    public function testWindDirectionName(): void
    {
        $this->assertSame('東北東', Converter::windDirectionName(4));
        $this->assertSame('東北東', Converter::windDirectionName('東北東'));
        $this->assertNull(Converter::windDirectionName(-1));
        $this->assertNull(Converter::windDirectionName('競艇'));
        $this->assertNull(Converter::windDirectionName(null));
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
