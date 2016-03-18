<?PHP

namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class IPv4 implements IValidator
{
    public static function validate($input)
    {
        return filter_var($input, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false;
    }
}
