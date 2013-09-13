<?php

namespace UAParser\Tests;

use UAParser\UAParser;
use Symfony\Component\Yaml\Yaml;

/**
 * @author Benjamin Laugueux <benjamin@yzalis.com>
 */
class DeviceParserTest extends \PHPUnit_Framework_TestCase
{
    protected $uaParser;

    public function setUp()
    {
        $this->uaParser = new UAParser();
    }

    /**
     * @dataProvider deviceDataProvider
     */
    public function testBrowserParser($uaString, $expectedConstructor, $expectedModel, $expectedType)
    {
        $result = $this->uaParser->parse($uaString);

        $this->assertEquals($expectedConstructor, $result->getDevice()->getConstructor());
        $this->assertEquals($expectedModel, $result->getDevice()->getModel());
        $this->assertEquals($expectedType, $result->getDevice()->getType());
    }

    public function deviceDataProvider()
    {
        return Yaml::parse(__DIR__.'/Fixtures/devices.yml');
    }
}
