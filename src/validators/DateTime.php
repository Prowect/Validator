<?PHP

namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class DateTime implements IValidator
{
    public static function validate($input)
    {
        return Date::validate($input) != false && Time::validate($input) != false;
    }
}
