<?PHP

namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class Date implements IValidator
{
    public static function validate($input)
    {
        $dateParts = explode('-', $input);
        if (count($dateParts) == 3) {
            return checkdate($dateParts[1], $dateParts[2], $dateParts[0]);
        }
        return false;
    }
}
