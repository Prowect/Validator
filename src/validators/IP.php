<?PHP

namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class IP implements IValidator
{
    public static function validate($input)
    {
      return IPv4::validate($input) || IPv6::validate($input);
    }
}
