<?PHP

namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class Date implements IValidator
{
    public static function validate($input)
    {
        $date = date_parse($input);
        if ($date !== false) {
            return checkdate($date['month'], $date['day'], $date['year']);
        }

        return false;
    }
}
