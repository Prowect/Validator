<?php

namespace tests;

use Drips\Validator\validators\Required;
use PHPUnit_Framework_TestCase;

class RequiredTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function testRequired($string, $result)
	{
		$validator = new Required;
	    $this->assertEquals($validator->validate($string), $result);
	}

    public function dataProvider()
    {
        return array(
			array(" ", false),
			array("", false),
			array("test", true),
			array("1", true)
        );
    }
}
