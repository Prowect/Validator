<?php

namespace tests;

use Drips\Validator\filters\StripTagsFilter;
use PHPUnit_Framework_TestCase;

include __DIR__.'/../vendor/autoload.php';

class StripTagsFilterTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function testStripTags($string, $result)
	{
	    $this->assertEquals(StripTagsfilter::filter($string), $result);
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
