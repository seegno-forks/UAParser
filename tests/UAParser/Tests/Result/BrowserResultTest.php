<?php

namespace UAParser\Tests\Result;

use UAParser\Result\BrowserResult;

/**
 * @author Benjamin Laugueux <benjamin@yzalis.com>
 */
class BrowserResultTest extends \PHPUnit_Framework_TestCase
{
    public function testFromArray()
    {
        $browserResult = new BrowserResult();
        $browserResult->fromArray(array(
            'family' => 'Safari',
            'major'  => '6',
            'minor'  => '0',
            'patch'  => '2',
        ));

        $this->assertInstanceOf('UAParser\Result\BrowserResult', $browserResult);
        $this->assertInstanceOf('UAParser\Result\BrowserResultInterface', $browserResult);

        $this->assertEquals('Safari', $browserResult->getFamily());
        $this->assertInternalType('string', $browserResult->getFamily());

        $this->assertEquals(6, $browserResult->getMajor());
        $this->assertInternalType('integer', $browserResult->getMajor());

        $this->assertEquals(0, $browserResult->getMinor());
        $this->assertInternalType('integer', $browserResult->getMinor());

        $this->assertEquals(2, $browserResult->getPatch());
        $this->assertInternalType('integer', $browserResult->getPatch());

        $this->assertEquals('Safari 6.0.2', $browserResult->__toString());

        $this->assertEquals('6.0.2', $browserResult->getVersionString());
    }

    public function testGetVersionStringWithMajorPartOnly()
    {
        $browserResult = new BrowserResult();
        $browserResult->fromArray(array(
            'family' => 'Safari',
            'major'  => '6',
        ));

        $this->assertEquals('6', $browserResult->getVersionString());
    }

    public function testGetVersionStringWithMajorAndMinorPartsOnly()
    {
        $browserResult = new BrowserResult();
        $browserResult->fromArray(array(
            'family' => 'Safari',
            'major'  => '6',
            'minor'  => '0',
        ));

        $this->assertEquals('6.0', $browserResult->getVersionString());
    }
}
