<?
namespace src\Bridge\tests;

use PHPUnit\Framework\TestCase;
use src\Bridge\FormAssemblyProvider;

class FormAssemblyProviderTest extends TestCase
{
    const API_BASE_URL = "https://app.formassembly.com/api_v1/responses/export/12345.json";
    const MOCK_TOKEN = "b7FUSyMGKpQXi1";

    private function getMockProviderInstance($token = self::MOCK_TOKEN)
    {
        return new FormAssemblyProvider($token);
    }

    public function testBuildUrlPass(): void
    {
        $api = $this->getMockProviderInstance();
        $inputString = "responses/export/12345.json";
        $expectedUrl = "https://app.formassembly.com/api_v1/" . $inputString;
        $url = $api->buildUrl($inputString);

        $this->assertTrue(is_string($url));
        $this->assertEquals($expectedUrl, $url);
    }

    public function testBuildUrlFail(): void
    {
        $api = $this->getMockProviderInstance();
        $inputString = [];
        $expectedUrl = "";
        $url = $api->buildUrl($inputString);

        $this->assertTrue(is_string($url));
        $this->assertTrue($expectedUrl === $url);
    }

    public function testCheckPathPass(): void
    {
        $api = $this->getMockProviderInstance();
        $inputPath = "forms/index.json";
        $expectedPath = $inputPath;
        $path = $api->checkPath($inputPath);

        $this->assertEquals($expectedPath, $path);
    }

    public function testCheckPathFail(): void
    {
        $this->expectException(\Exception::class);
        $api = $this->getMockProviderInstance();
        $inputPath = null;
        $api->checkPath($inputPath);

    }
    public function testGetArgsWithAccessTokenPass(): void
    {
        $api = $this->getMockProviderInstance();
        $inputArgs = ["first_name" => "Christopher", "last_name" => "Columbus"];
        
        $argsWithAccessToken = $api->getArgsWithAccessToken($inputArgs);

        $this->assertArrayHasKey("access_token", $argsWithAccessToken);
        $this->assertArrayHasKey("first_name", $argsWithAccessToken);
        $this->assertArrayHasKey("last_name", $argsWithAccessToken);
        $this->assertTrue(count($argsWithAccessToken) == 3);
        $this->assertTrue($argsWithAccessToken["last_name"] === "Columbus");
    }

    public function testGetArgsWithAccessTokenEmptyData(): void
    {
        $api = $this->getMockProviderInstance();
        $inputArgs = [];

        $argsWithAccessToken = $api->getArgsWithAccessToken($inputArgs);

        $expectedResult = ['access_token' => self::MOCK_TOKEN];
        $this->assertEquals($expectedResult, $argsWithAccessToken);
        $this->assertTrue(count($argsWithAccessToken) == 1);
    }

    public function testHttpBuildQueryPass(): void
    {
        $api = $this->getMockProviderInstance();
        $inputArgs = ['date' => 'abc', 'show_all' => true];

        $httpQuery = $api->httpBuildQuery($inputArgs);

        $this->assertTrue($httpQuery !== '');
        $this->assertContains('date', $httpQuery);
        $this->assertContains('show_all', $httpQuery);
        $this->assertContains('abc', $httpQuery);
        $this->assertContains('?', $httpQuery);
    }

    public function testHttpBuildQueryFromEmptyArray(): void
    {
        $api = $this->getMockProviderInstance();
        $inputArgs = [];

        $httpQuery = $api->httpBuildQuery($inputArgs);

        $this->assertFalse($httpQuery === '');
        $this->assertContains('?', $httpQuery);
        $this->assertContains("access_token", $httpQuery);
        $this->assertContains(self::MOCK_TOKEN, $httpQuery);
    }




}
