# Validator

[![Build Status](https://travis-ci.org/Prowect/Validator.svg)](https://travis-ci.org/Prowect/Validator)
[![Code Climate](https://codeclimate.com/github/Prowect/Validator/badges/gpa.svg)](https://codeclimate.com/github/Prowect/Validator)
[![Test Coverage](https://codeclimate.com/github/Prowect/Validator/badges/coverage.svg)](https://codeclimate.com/github/Prowect/Validator/coverage)
[![Latest Release](https://img.shields.io/packagist/v/drips/Validator.svg)](https://packagist.org/packages/drips/validator)

## Beschreibung

Die Validators ermöglichen eine einheitliche Eingabeüberprüfung. Außerdem gibt es die Möglichkeit zum Filtern von Eingaben.

## Validierung mittels Validator

Ein Validator ist ein Objekt, welches das `IValidator`-Interface implementiert und somit eine Methode `validate($input)` zur Verfügung stellt. Dementsprechend kann ein Validator-Objekt angelegt und anschließend ein String, mithilfe der Methode `validate`, validiert werden. Außerdem können Validators zusammengefasst werden, wie das folgende Beispiel zeigen soll.

```php
<?php
use Drips\Validator\Validator;
use Drips\Validator\validators\Email;

$validator = new Validator;
$validator->add(new Email);

if(array_product($validator->validate("test@prowect.com"))){
    // Gültige Email-Adresse
} else {
    // Ungültige Email-Adresse
}
```

> Grundsätzlich liefert ein einzelnes Validator-Objekt (z.B.: `Email`) legilich `true` oder `false` zurück. Erzeugt man jedoch einen Validator aus mehreren Validators (`Validator`) so wird ein Array zurückgeliefert, welches als `Key` den jeweiligen Validator und als `Value` den Rückgabewert dessen, beinhaltet.  
>
> In diesem Fall würde also `array("\Drips\Validator\Validators\Email" => true)` zurückkommen.  
>
> Mithilfe der Funktion `array_product` werden die einzelnen Werte des Arrays multipliziert. Schlug die Validierung bei einem Validator fehl und liefert somit `false` (`0`) zurück, so werden die Werte gemeinsam multipliziert und als Ergebnis würde `0` (`false`) zurückgeliefert werden.  
>
> Sind alle Werte in dem Array `true` (`1`) wird als Ergebnis `1` (`true`) zurückgegeben.

### Arten von Validators

Folgende Validators sind zurzeit implementiert:

|Validator    | Beschreibung                |   Verwendung
|-------------|-----------------------------|--------------
| **Between** | Vergleicht ob eine Zahl innerhalb eines Bereichs liegt | `new Between($min_value, $max_value);`
| **Date**    | Prüft ob es sich beim übergebenen Wert um ein gültiges Datum handelt. Optional kann ein Format angegeben werden. (siehe [PHP-Dokumentation: Datumsformat](http://php.net/manual/de/datetime.createfromformat.php)) | `new Date($format = null);`
| **Email**   | Schaut ob es sich beim Eingabewert um eine gültige Email-Adresse handelt. | `new Email;`
| **InArray** | Prüft ob der Eingabewert ein gültiger Wert, innerhalb eines Arrays ist. | `new InArray(array("male", "female"));`
| **IP**      | Überprüft ob es sich um eine gültige IP-Adresse handelt. | `new IP;`
| **IPv4**    | Überprüft ob es sich um eine gültige IPv4-Adresse handelt. | `new IPv4;`
| **IPv6**    | Überprüft ob es sich um eine gültige IPv6-Adresse handelt. | `new IPv6;`
| **Max**     | Überprüft ob eine Zahl kleiner als eine gegebene Zahl ist. | `new Max($max_value);`
| **Maxlength** | Überprüft ob der eingegebene Text, eine maximale Zeichenlänge nicht überschreitet. | `new Maxlength($max_length);`
| **Min**     | Überprüft ob eine Zahl größer als eine gegebene Zahl ist. | `new Min($min_value);`
| **Minlength** | Überprüft ob der eingegebene Text die jeweilige Mindestlänge beschreibt. | `new Minlength($min_length);`
| **Number** | Überprüft ob es sich um eine gültige Zahl handelt. | `new Number;`
| **Regex** | Ermöglicht die Validierung mittels Regex | `new Regex($regex);`
| **Required** | Beschreibt, dass eine leere Eingabe (`''`) ungültig ist. | `new Required;`
| **Time** | Überprüft ob es sich bei der Eingabe um eine gültige Uhrzeit handelt. | `new Time;`
| **Url** | Überprüft ob es sich beim Eingabestring um eine gültige URL handelt. | `new Url;`

> Es ist zu beachten, dass jeder Validator über eine zugehörige `validate($input)`-Methode verfügt, mit der eine zu überprüfende Eingabe übergeben werden kann.

> Die einzelnen Validators liefern jeweils `true` oder `false` als Ergebnis und befinden sich im Namespace `\Drips\Validator\validators`.

## Filtern

Neben den Validators gibt es auch Filter. Diese liefern als Ergebnis nicht `true` oder `false` sondern den *gefilterten Text* zurück.

Ein Filter ist ein Objekt, welches das `IFilter`-Interface implementiert und somit eine Methode `filter($input)` zur Verfügung stellt. Dementsprechend kann ein Filter-Objekt angelegt und anschließend ein String, mithilfe der Methode `filter`, gefiltert werden. Außerdem können Filter zusammengefasst werden, wie das folgende Beispiel zeigen soll.


```php
<?php
use Drips\Validator\Filter;
use Drips\Validator\filters\StripTags;

$filter = new Filter;
$filter->add(new StripTags);

$input = "<h1>HTML</h1>";
$output = $filter->filter($input);
// $output == "HTML"
```

> Mithilfe des `StripTags`-Filters werden die HTML-Tags des ursprünglichen Strings `$input` entfernt.

### Arten von Filtern

| Filter           | Beschreibung     | Verwendung
|------------------|------------------|-------------
| **HtmlEntities** | Ersetzt bestimmte Zeichen durch die Verwendung der `htmlentities()` Funktion von PHP. | `new HtmlEntities;`
| **StripTags**    | Entfernt HTML-Tags innerhalb eines Strings | `new StripTags;`
| **Trim** | Entfernt überflüssige Leerzeichen (oder andere Zeichen) am Anfang und am Ende eines Strings. Standardmäßig werden Leerzeichen und so weiter entfernt, wie es mit der `trim()` Funktion von PHP üblich ist. Optional können auch andere Zeichen entfernt werden. | `new Trim($character = null)`;


> Es ist zu beachten, dass jeder Filter über eine zugehörige `filter($input)`-Methode verfügt, mit der eine zu filternde Eingabe übergeben werden kann.

> Die einzelnen Filter liefern jeweils den gefilterten Text als Ergebnis und befinden sich im Namespace `\Drips\Validator\filters`.
