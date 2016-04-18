<?php

namespace tests;

use Drips\Validator\Filter;
use Drips\Validator\filters\StripTags;
use Drips\Validator\filters\Trim;
use PHPUnit_Framework_TestCase;

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

	public function testFilterGet()
	{
		$filter = new Filter;
		$this->assertEmpty($filter->getFilters());
		$filter->add(new Trim);
		$this->assertNotEmpty($filter->getFilters());
	}

	public function testFilterCombine()
	{
		$filter1 = new Filter;
		$filter2 = new Filter;
		$filter1->add(new Trim);
		$filter2->add(new StripTags);
		$filter1->add($filter2);
		$filters = $filter1->getFilters();
		$this->assertEquals(count($filters), 2);
	}
}
