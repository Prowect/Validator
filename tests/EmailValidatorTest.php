<?php

namespace tests;

use Drips\Validator\validators\Email;
use PHPUnit_Framework_TestCase;

include __DIR__.'/../vendor/autoload.php';

class EmailValidatorTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider emailProvider
	 */
	public function testEmail($email, $result)
	{
	    $this->assertEquals(Email::validate($email), $result);
	}

    public function emailProvider()
    {
        return array(array('test@prowect.com', true), array('123', false));
    }
}
