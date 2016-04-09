<?php

namespace tests;

use Drips\Validator\validators\Time;
use PHPUnit_Framework_TestCase;

include __DIR__.'/../vendor/autoload.php';
date_default_timezone_set('Europe/Berlin');

class TimeValidatorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dateProvider
     */
    public function testTime($time, $result)
    {
        $validator = new Time;
        $this->assertEquals($validator->validate($time), $result);
    }

    public function dateProvider()
    {
        return array(
            array('12:00', true),
            array('0:00', true),
            array('23:21', true),
            array('09:30:20', true),
            array("asdf", false),
            array("01.01.16", false),
            array("25:30", false),
            array("22:70", false),
            array("-2:30", false)
        );
    }
}
