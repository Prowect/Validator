<?PHP

namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class IPv6 implements IValidator
{
    public function validate($input)
    {
        return filter_var($input, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== false;
    }
}
