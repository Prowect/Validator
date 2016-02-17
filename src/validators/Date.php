<?PHP

namespace Drips\Validator\validators;
use Drips\Validator\IValidator;

class Date implements IValidator {

public static function validate($input){

    return (bool)strpbrk($input,1234567890) && strtotime($input);

}


}


?>



