<?php

namespace tests;

use Drips\Validator\validators\Number;
use PHPUnit_Framework_TestCase;

class NumberValidatorTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function testNumber($number, $result)
	{
		$validator = new Number;
	    $this->assertEquals($validator->validate($number), $result);
	}

    public function dataProvider()
    {
        return array(
            array(123, true),
            array(1, true),
            array("text", false),
            array(12.23, true),
            array("13", true),
            array(false, false),
            array(true, false),
            array("", false)
        );
    }
}
