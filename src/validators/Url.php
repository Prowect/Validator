<?PHP

namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class Url implements IValidator {

public static function validate($input){

return filter_var($input, FILTER_VALIDATE_URL);

}

}

?>
