<?php

namespace tests;

use Drips\Validator\validators\Between;
use PHPUnit_Framework_TestCase;

class BetweenValidatorTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function testBetween($text, $min, $max, $result)
	{
		$validator = new Between($min, $max);
	    $this->assertEquals($validator->validate($text), $result);
	}

    public function dataProvider()
    {
        return array(
			array(1, 5, 0, false),
            array("1", 0, 5, true),
            array("abcde", 3, 4, false),
			array(9, 5, 11, true),
			array(6, 0, 4, false),
			array("3", 1, 9, true)
        );
    }
}
