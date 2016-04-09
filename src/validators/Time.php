<?PHP

namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class Time implements IValidator
{
    public function validate($input)
    {
        $time = explode(':', $input);
        $size = count($time);
        if ($size >= 2 && $size <= 3) {
            $hours = $time[0];
            $minutes = $time[1];
            $seconds = $size == 3 ? $time[2] : 0;

            if ($hours >= 0 && $hours <= 23 && $minutes >= 0 && $minutes <= 59 && $seconds >= 0 && $seconds <= 59) {
                return mktime($hours, $minutes, $seconds) !== false;
            }
        }

        return false;
    }
}
