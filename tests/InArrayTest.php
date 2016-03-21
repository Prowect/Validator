<?php

namespace tests;

use Drips\Validator\validators\InArray;
use PHPUnit_Framework_TestCase;

include __DIR__.'/../vendor/autoload.php';

class InArrayTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function testInArray($string, array $array, $result)
	{
	    $this->assertEquals(InArray::validate($string, $array), $result);
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
