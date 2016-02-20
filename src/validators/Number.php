<?PHP

namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class Number implements IValidator
{
    public static function validate($input)
    {
        return is_numeric($input);
    }
}
