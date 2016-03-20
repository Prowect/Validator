<?php

namespace tests;

use Drips\Validator\filters\StripTags;
use PHPUnit_Framework_TestCase;

include __DIR__.'/../vendor/autoload.php';

class HtmlEntitiesTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function testHtmlEntities($string, $result)
	{
	    $this->assertEquals(HtmlEntities::filter($string), $result);
	}

    public function dataProvider()
    {
        return array(
            array("<strong>Test</strong>", "&lt;strong&rt;Test&lt;/strong&rt;"),
            array("Test", "Test"),
            array("<script>alert('Test');</script>", "&lt;script&rt;alert('Test');&lt;/script&rt;")
        );
    }
}
