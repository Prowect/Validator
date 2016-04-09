<?PHP

namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class IP implements IValidator
{
    public function validate($input)
    {
        $ipv4_validator = new IPv4;
        $ipv6_validator = new IPv6;

        return $ipv4_validator->validate($input) || $ipv6_validator->validate($input);
    }
}
