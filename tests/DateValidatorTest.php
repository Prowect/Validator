<?php

namespace tests;

use Drips\Validator\validators\Date;
use PHPUnit_Framework_TestCase;

date_default_timezone_set('Europe/Berlin');

class DateValidatorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dateProvider
     */
    public function testDate($date, $format, $result)
    {
        $validator = new Date($format);
        $this->assertEquals($validator->validate($date), $result);
    }

    public function dateProvider()
    {
        return array(
            array('12.06.2006', 'd.m.Y', true),
            array('32.07.2015', 'd.m.Y', false),
            array('28.02.1995', 'd.m.Y', true),
            array('30.02.1995', 'd.m.Y', false),
			array('20.02.2013', null, true)
        );
    }
}
