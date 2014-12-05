# filmweb-php

UWAGA PROJEKT PRZENIESIONY DO [filmweb-api](https://github.com/nSolutionsPL/filmweb-api)

Prosty parser filmweb.pl - na chwilę obecną zwraca takie dane jak: tytuł filmu, oryginaly tytuł, opis, rok produkcji, kategorie.

Zapraszam do odwiedzenia strony [nSolutions.pl](http://www.nsolutions.pl/)

# Przykładowy zrzut dla filmu Matrix
<pre>
object(stdClass)#1 (7) {
  ["title"]=>
  string(6) "Matrix"
  ["origTitle"]=>
  string(11) "Matrix, The"
  ["description"]=>
  string(178) "Haker komputerowy Neo dowiaduje się od tajemniczych rebeliantów o tym, że świat w którym żyje jest tylko obrazem przesyłanym do jego mózgu przez roboty."
  ["year"]=>
  string(4) "1999"
  ["genres"]=>
  array(2) {
    [0]=>
    array(2) {
      ["key"]=>
      string(2) "28"
      ["value"]=>
      string(5) "akcja"
    }
    [1]=>
    array(2) {
      ["key"]=>
      string(2) "33"
      ["value"]=>
      string(6) "sci-fi"
    }
  }
  ["cover"]=>
  string(60) "http://1.fwcdn.pl/po/06/28/628/7495038.3.jpg?l=1350559192000"
  ["tags"]=>
  array(24) {
    [0]=>
    string(4) "Lana"
    [1]=>
    string(9) "Wachowski"
    [2]=>
    string(4) "Andy"
    [3]=>
    string(9) "Wachowski"
    [4]=>
    string(5) "Keanu"
    [5]=>
    string(6) "Reeves"
    [6]=>
    string(8) "Laurence"
    [7]=>
    string(9) "Fishburne"
    [8]=>
    string(11) "Carrie-Anne"
    [9]=>
    string(4) "Moss"
    [10]=>
    string(4) "Hugo"
    [11]=>
    string(7) "Weaving"
    [12]=>
    string(6) "Gloria"
    [13]=>
    string(6) "Foster"
    [14]=>
    string(3) "Joe"
    [15]=>
    string(10) "Pantoliano"
    [16]=>
    string(6) "Marcus"
    [17]=>
    string(5) "Chong"
    [18]=>
    string(6) "Julian"
    [19]=>
    string(8) "Arahanga"
    [20]=>
    string(7) "Belinda"
    [21]=>
    string(7) "McClory"
    [22]=>
    string(4) "Matt"
    [23]=>
    string(5) "Doran"
  }
}
</pre>
# Przykładowe użycie
```php
<?php
// Ładowanie klasy filmweba
require_once 'classes/filmweb.php';

// Ładowanie klasy Remote
require_once 'classes/remote.php';

// Zwróci nam informacje o filmie Matrix
var_dump(Filmweb_Parser::getMovie('Matrix'));
?>
```

# TODO
Piszcie co dodać - jaką funkcjonalność :)


[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/nSolutionsPL/filmweb-php/trend.png)](https://bitdeli.com/free "Bitdeli Badge")

