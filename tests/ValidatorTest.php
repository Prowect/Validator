<?php

namespace tests;

use Drips\Validator\Validator;
use Drips\Validator\validators\Required;
use Drips\Validator\validators\Min;
use Drips\Validator\validators\Max;
use PHPUnit_Framework_TestCase;

include __DIR__.'/../vendor/autoload.php';

class ValidatorTest extends PHPUnit_Framework_TestCase
{
	public function testValidatorRequired()
	{
        $input = "";
		$validator = new Validator;
        $this->assertTrue((bool)array_product($validator->validate($input)));
        $validator->add(new Required);
        $this->assertFalse((bool)array_product($validator->validate($input)));
	}

    public function testValidatorBetween()
    {
        $validator = new Validator;
        $this->assertTrue((bool)array_product($validator->validate(10)));
        $validator->add(new Min(1));
        $this->assertTrue((bool)array_product($validator->validate(3)));
        $this->assertTrue((bool)array_product($validator->validate(11)));
        $this->assertFalse((bool)array_product($validator->validate(0)));
        $validator->add(new Max(10));
        $this->assertTrue((bool)array_product($validator->validate(3)));
        $this->assertFalse((bool)array_product($validator->validate(11)));
    }

	public function testValidatorGet()
	{
		$validator = new Validator;
		$this->assertEmpty($validator->getValidators());
		$validator->add(new Required);
		$this->assertNotEmpty($validator->getValidators());
	}

	public function testValidatorCombine()
	{
		$validator1 = new Validator;
		$validator2 = new Validator;
		$validator1->add(new Required);
		$validator2->add(new Min(1));
		$validator2->add(new Max(10));
		$validator1->add($validator2);
		$validators = $validator1->getValidators();
		$this->assertEquals(count($validators), 3);
	}
}
