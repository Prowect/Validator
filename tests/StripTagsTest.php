<?php

namespace tests;

use Drips\Validator\filters\StripTags;
use PHPUnit_Framework_TestCase;

include __DIR__.'/../vendor/autoload.php';

class StripTagsTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function testStripTags($string, $result)
	{
	    $this->assertEquals(StripTags::filter($string), $result);
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
