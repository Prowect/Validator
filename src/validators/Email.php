<?PHP

namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class Email implements IValidator
{
    public function validate($input)
    {
        return filter_var($input, FILTER_VALIDATE_EMAIL) !== false;
    }
}
