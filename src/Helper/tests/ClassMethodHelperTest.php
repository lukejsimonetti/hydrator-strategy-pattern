<?php
use PHPUnit\Framework\TestCase;
use src\Helper\ClassMethodHelper;

class ClassMethodHelperTest extends TestCase
{
    public function testGetMethodName(): void
    {
        $oldString = "is_new";
        $expectedResult = "setIsNew";
        $result = ClassMethodHelper::getSafeMethodName($oldString, "set");

        $this->assertEquals($expectedResult, $result);
    }

    public function testGetMethodName2(): void
    {
        $oldString = "is_new_flag";
        $expectedResult = "setIsNewFlag";
        $result = ClassMethodHelper::getSafeMethodName($oldString, "set");

        $this->assertEquals($expectedResult, $result);
    }

    public function testGetMethodName3(): void
    {
        $oldString = "is_new_flag";
        $expectedResult = "getIsNewFlag";
        $result = ClassMethodHelper::getSafeMethodName($oldString, "set");

        $this->assertNotEquals($expectedResult, $result);
    }
}