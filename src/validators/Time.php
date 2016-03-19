<?PHP

namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class Time implements IValidator
{
    public static function validate($input)
    {
        $time = explode(':', $input);
        $size = count($time);
        if (Between::validate($size, 2, 3)) {
            $hours = $time[0];
            $minutes = $time[1];
            $seconds = $size == 3 ? $time[2] : 0;

            if (Between::validate($hours, 0, 23) && Between::validate($minutes, 0, 59) && Between::validate($seconds, 0, 59)) {
                return mktime($hours, $minutes, $seconds) !== false;
            }
        }

        return false;
    }
}
