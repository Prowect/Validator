<?php

namespace tests;

use Drips\Validator\filters\Required;
use PHPUnit_Framework_TestCase;

include __DIR__.'/../vendor/autoload.php';

class TrimTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function testRequired($string, $result)
	{
	    $this->assertEquals(Required::filter($string), $result);
	}

    public function dataProvider()
    {
        return array(
			array(" ", false),
			array("", false),
			array("test", true),
			array("1", true)
        );
    }
}
