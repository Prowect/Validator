<?PHP

namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class Text implements IValidator {

public static function validate($input){

return filter_var($input, FILTER_VALIDATE_IP);

}



}


?>