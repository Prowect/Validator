<?php

namespace tests;

use Drips\Validator\validators\Minlength;
use PHPUnit_Framework_TestCase;

class MinlengthValidatorTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function testMinlength($text, $minlength, $result)
	{
		$validator = new Minlength($minlength);
	    $this->assertEquals($validator->validate($text), $result);
	}

    public function dataProvider()
    {
        return array(
            array("abc", 5, false),
            array("abcde", 5, true),
            array("abcde", 3, true)
        );
    }
}
