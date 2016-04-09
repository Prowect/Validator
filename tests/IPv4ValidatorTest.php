<?php

namespace tests;

use Drips\Validator\validators\IPv4;
use PHPUnit_Framework_TestCase;

include __DIR__.'/../vendor/autoload.php';

class IPv4ValidatorTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function testIPv4($ip, $result)
	{
		$validator = new IPv4;
	    $this->assertEquals($validator->validate($ip), $result);
	}

    public function dataProvider()
    {
        return array(
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
