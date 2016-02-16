<?PHP

namespace tests;

use Drips\Validator\validators\Email;
use PHPUnit_Framework_TestCase;

class EmailValidatorTest extends PHPUnit_Framework_TestCase {

/**
 * @dataProvider emailProvider
*/
public function testEmail($email, $result){
	$this->assertEquals(Email::validate($email),$result);
}

public function emailProvider(){
	return array(array("test@example.com", true), array("123", false));
}



}

?>