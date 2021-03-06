<?php

namespace tests;

use Drips\Validator\filters\StripTags;
use PHPUnit_Framework_TestCase;

class StripTagsTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function testStripTags($string, $result)
	{
		$filter = new StripTags;
	    $this->assertEquals($filter->filter($string), $result);
	}

    public function dataProvider()
    {
        return array(
            array("<strong>Test</strong>", "Test"),
            array("Test", "Test"),
            array("<script>alert('Test');</script>", "alert('Test');")
        );
    }
}
