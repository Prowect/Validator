<?PHP

namespace Drips\Validator\validators;

use Drips\Validator\IValidator;

class Time implements IValidator
{
    public static function validate($input)
    {
      $time = explode(":", $input);
      if(count($time) == 2){
        return mktime($time[0], $time[1]) != false;
      } elseif (count($time) == 3) {
      return mktime($time[0], $time[1], $time[2]) != false;
      }
      return false;
    }
}
