<?php

namespace tests;

use Drips\Validator\validators\Regex;
use PHPUnit_Framework_TestCase;

class RegexTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function testRegex($string, $regex, $result)
	{
		$validator = new Regex($regex);
	    $this->assertEquals($validator->validate($string), $result);
	}

    public function dataProvider()
    {
        return array(
			array("a", "/^[a-z]$/", true),
			array("B", "/^[a-z]$/", false),
			array("1234", "/^[a-zA-Z]\w{3,14}$/", false),
			array("password", "/^[a-zA-Z]\w{3,14}$/", true),
			array("@TEST(adsf)", "/(?<!#)@([A-Z0-9_]+)(?:\(([^;\n<]*)(?:; ?(.*))*\))?/", true),
			array("Testffffffffffffff@", "/(?<!#)@([A-Z0-9_]+)(?:\(([^;\n<]*)(?:; ?(.*))*\))?/", false)
        );
    }
}
