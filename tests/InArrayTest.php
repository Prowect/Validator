<?php

namespace tests;

use Drips\Validator\validators\InArray;
use PHPUnit_Framework_TestCase;

class InArrayTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function testInArray($string, array $array, $result)
	{
		$validator = new InArray($array);
	    $this->assertEquals($validator->validate($string), $result);
	}

    public function dataProvider()
    {
        return array(
			array("Test", array("Das", "ist", "ein", "Test"),  true),
			array("männlich", array("männlich", "weiblich"), true),
			array("Name", array("Das", "ist", "ein", "Test"), false),
			array(1, array(1, 2, 3), true),
			array(2, array(3, 4, 5), false)
        );
    }
}
