<?php

namespace tests;

use Drips\Validator\validators\Url;
use PHPUnit_Framework_TestCase;

class UrlValidatorTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function testUrl($url, $result)
	{
		$validator = new Url;
	    $this->assertEquals($validator->validate($url), $result);
	}

    public function dataProvider()
    {
        return array(
            array("prowect.com", false),
            array("ftp://prowect.com", true),
            array("http://prowect.com", true),
            array("http://prowect.com/home/index.html", true),
            array("http://prowect.com/gallery", true),
            array("http://www.google.at/", true),
            array("keineURL", false),
            array("ws://192.167.1.1", true),
            array("https://user:pwd@domain.tld", true)
        );
    }
}
