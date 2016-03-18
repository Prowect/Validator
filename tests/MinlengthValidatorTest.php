<?php

namespace tests;

use Drips\Validator\validators\Minlength;
use PHPUnit_Framework_TestCase;

include __DIR__.'/../vendor/autoload.php';

class MinlengthValidatorTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function testMinlength($text, $minlength, $result)
	{
	    $this->assertEquals(Minlength::validate($text, $minlength), $result);
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
