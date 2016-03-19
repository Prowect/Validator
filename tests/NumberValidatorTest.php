<?php

namespace tests;

use Drips\Validator\validators\Number;
use PHPUnit_Framework_TestCase;

include __DIR__.'/../vendor/autoload.php';

class NumberValidatorTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function testNumber($number, $result)
	{
	    $this->assertEquals(Number::validate($number), $result);
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
