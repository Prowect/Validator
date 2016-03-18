<?php

namespace tests;

use Drips\Validator\validators\IPv6;
use PHPUnit_Framework_TestCase;

include __DIR__.'/../vendor/autoload.php';

class IPv6ValidatorTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function testIPv6($ip, $result)
	{
	    $this->assertEquals(IPv6::validate($ip), $result);
	}

    public function dataProvider()
    {
        return array(
            array("::1", true),
			array("2001:db8:0:8d3:0:8a2e:70:7344", true),
			array("129.12.23.21", false),
			array("keineIP", false),
			array("2001:db8::1428:57ab", true)
        );
    }
}
