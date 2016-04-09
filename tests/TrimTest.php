<?php

namespace tests;

use Drips\Validator\filters\Trim;
use PHPUnit_Framework_TestCase;

include __DIR__.'/../vendor/autoload.php';

class TrimTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function testTrim($string, $character, $result)
	{
		$filter = new Trim($character);
	    $this->assertEquals($filter->filter($string), $result);
	}

    public function dataProvider()
    {
        return array(
			array(" das ist ein Test ", null, "das ist ein Test"),
			array(" das ist ein Test", null, "das ist ein Test"),
			array("das ist ein Test ", null, "das ist ein Test"),
			array("    das ist ein Test ", null, "das ist ein Test"),
			array("das ist ein Test", 'd', "as ist ein Test"),
			array("ddas ist ein Test", 'd', "as ist ein Test"),
			array("das ist ein Test", 'dast', " ist ein Te")
        );
    }
}
