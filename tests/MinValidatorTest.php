<?php

namespace tests;

use Drips\Validator\validators\Min;
use PHPUnit_Framework_TestCase;

include __DIR__.'/../vendor/autoload.php';

class MinValidatorTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function testMin($text, $min, $result)
	{
	    $this->assertEquals(Min::validate($text, $min), $result);
	}

    public function dataProvider()
    {
        return array(
            array(1, 5, false),
            array("1", 5, false),
            array("abcde", 3, false),
			array(-1, 5, false),
			array(6, 5, true),
			array("3", 1, true)
        );
    }
}
