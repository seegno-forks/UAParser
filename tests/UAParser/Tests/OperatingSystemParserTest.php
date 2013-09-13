<?php

namespace UAParser\Tests;

use UAParser\UAParser;
use Symfony\Component\Yaml\Yaml;

/**
 * @author Benjamin Laugueux <benjamin@yzalis.com>
 */
class OperatingSystemParserTest extends \PHPUnit_Framework_TestCase
{
    protected $uaParser;

    public function setUp()
    {
        $this->uaParser = new UAParser();
    }

    /**
     * @dataProvider operatingSystemDataProvider
     */
    public function testOperatingSystemParser($uaString, $expectedFamily, $expectedMajor, $expectedMinor, $expectedPatch)
    {
        $result = $this->uaParser->parse($uaString);

        $this->assertEquals($expectedFamily, $result->getOperatingSystem()->getFamily());
        $this->assertEquals($expectedMajor, $result->getOperatingSystem()->getMajor());
        $this->assertEquals($expectedMinor, $result->getOperatingSystem()->getMinor());
        $this->assertEquals($expectedPatch, $result->getOperatingSystem()->getPatch());
    }

    public function operatingSystemDataProvider()
    {
        return Yaml::parse(__DIR__.'/Fixtures/operating_systems.yml');
    }
}
