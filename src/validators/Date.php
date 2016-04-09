<?PHP

namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class Date implements IValidator
{
    protected $format;

    public function __construct($format = null)
    {
        $this->format = $format;
    }

    public function validate($input)
    {
        if ($this->format == null) {
            $date = date_create($input);
        } else {
            $date = date_create_from_format($this->format, $input);
        }

        if ($date !== false && !array_sum($date->getLastErrors())) {
            return true;
        }

        return false;
    }
}
