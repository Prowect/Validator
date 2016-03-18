<?php

namespace tests;

use Drips\Validator\validators\Maxlength;
use PHPUnit_Framework_TestCase;

include __DIR__.'/../vendor/autoload.php';

class MaxlengthValidatorTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function testMaxlength($text, $maxlength, $result)
	{
	    $this->assertEquals(Maxlength::validate($text, $maxlength), $result);
	}

    public function dataProvider()
    {
        return array(
            array("abc", 5, true),
            array("abcde", 5, true),
            array("abcde", 3, false)
        );
    }
}
