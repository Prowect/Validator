<?php

namespace tests;

use Drips\Validator\validators\Regex;
use PHPUnit_Framework_TestCase;

include __DIR__.'/../vendor/autoload.php';

class RegexTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function testRegex($string, $regex, $result)
	{
	    $this->assertEquals(Regex::validate($string, $regex), $result);
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
