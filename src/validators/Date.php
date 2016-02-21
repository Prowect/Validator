<?PHP

namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class Date implements IValidator
{
    public static function validate($input, $format = null)
    {
        if ($format == null) {
            $date = date_create($input);
        } else {
            $date = date_create_from_format($format, $input);
        }
        if ($date != false && !array_sum($date->getLastErrors())) {
            return true;
        }

        return false;
    }
}
