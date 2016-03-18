<?php

namespace tests;

use Drips\Validator\validators\IP;
use PHPUnit_Framework_TestCase;

include __DIR__.'/../vendor/autoload.php';

class IPValidatorTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function testIP($ip, $result)
	{
	    $this->assertEquals(IP::validate($ip), $result);
	}

    public function dataProvider()
    {
        return array(
            array("::1", true),
			array("2001:db8:0:8d3:0:8a2e:70:7344", true),
			array("129.12.23.21", true),
			array("keineIP", false),
			array("2001:db8::1428:57ab", true),
            array("192.168.1.1", true),
            array("192.168.1.2", true),
            array("192.168.1.3", true),
            array("192.168.2.1", true),
            array("192.168.3.1", true),
            array("192.168.1.100", true),
            array("1.1.1.1", true),
            array("300.1.1.2", false),
            array("keineIP", false),
            array("ac:ad:ad", false),
            array("a.b.c.d", false)
        );
    }
}
