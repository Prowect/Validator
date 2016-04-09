<?php

namespace tests;

use Drips\Validator\filters\HtmlEntities;
use PHPUnit_Framework_TestCase;

include __DIR__.'/../vendor/autoload.php';

class HtmlEntitiesTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function testHtmlEntities($string, $result)
	{
		$filter = new HtmlEntities;
	    $this->assertEquals($filter->filter($string), $result);
	}

    public function dataProvider()
    {
        return array(
            array("<strong>Test</strong>", "&lt;strong&gt;Test&lt;/strong&gt;"),
            array("Test", "Test"),
            array("<script>alert('Test');</script>", "&lt;script&gt;alert('Test');&lt;/script&gt;")
        );
    }
}
