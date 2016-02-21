<?PHP

namespace tests;

use Drips\Validator\validators\Date;
use PHPUnit_Framework_TestCase;

include(__DIR__."/../vendor/autoload.php");

class DateValidatorTest extends PHPUnit_Framework_TestCase {

/**
 * @dataProvider dateProvider
*/
public function testDate($date, $result){
	$this->assertEquals(Date::validate($date),$result);
}

public function dateProvider(){
	return array(array("12.06.2006", true), array("32.07.2015", false), array("1.1.16", true), array("29.02.1995", true));
}



}

?>
