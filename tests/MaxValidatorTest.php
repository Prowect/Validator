<?php

namespace tests;

use Drips\Validator\validators\Max;
use PHPUnit_Framework_TestCase;

class MaxValidatorTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function testMax($text, $max, $result)
	{
		$validator = new Max($max);
	    $this->assertEquals($validator->validate($text), $result);
	}

    public function dataProvider()
    {
        return array(
			array(1, 5, true),
            array("1", 5, true),
            array("abcde", 3, false),
			array(-1, 5, true),
			array(6, 5, false),
			array("3", 1, false)
        );
    }
}
