<?php

namespace tests;

use Drips\Validator\Filter;
use Drips\Validator\filters\StripTags;
use Drips\Validator\filters\Trim;
use PHPUnit_Framework_TestCase;

include __DIR__.'/../vendor/autoload.php';

class FilterTest extends PHPUnit_Framework_TestCase
{
	public function testFilter()
	{
        $input2 = "Test";
        $input = "<h1>$input2</h1>";
        $input3 = " $input ";

		$filter = new Filter;
        $this->assertEquals($filter->filter($input), $input);
        $filter->add(new StripTags);
        $this->assertEquals($filter->filter($input), $input2);
        $filter->add(new Trim);
        $this->assertEquals($filter->filter($input3), $input2);
	}
}
