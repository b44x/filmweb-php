# filmweb-php
Prosty parser filmweb.pl - na chwilę obecną zwraca takie dane jak: tytuł filmu, oryginaly tytuł, opis, rok produkcji, kategorie.
Zapraszam do odwiedzenia strony [nSolutions.pl](http://www.nsolutions.pl/)

# Przykładowy zrzut dla filmu Matrix
object(stdClass)#1 (5) {
  ["title"]=>
  string(6) "Matrix"
  ["origTitle"]=>
  string(11) "Matrix, The"
  ["description"]=>
  string(689) "Neo (Keanu Reeves) jest genialnym hakerem. Pewnego dnia nawiązuje z nim kontakt tajemniczy Morfeusz (Laurence Fishburne) - człowiek, który obiecuje mu odkryć prawdę o rzeczywistości, w jakiej żyją. Prawdę o Matriksie. Prawdę o dwóch światach: prawdziwym i wygenerowanym, który ma tylko "udawać" rzeczywistość. Neo przystaje do grupy kierowanej przez Morfeusza i zaczyna dostrzegać, że ze świat, w którym żył dotychczas to fikcja. Że jego życiem cały czas ktoś kierował. Kolejne stopnie wtajemniczenia stawiają przed Neo nowe pytania. Który ze światów jest prawdziwy? Czym jest Matrix i komu służy? I jaką rolę w planie Morfeusza ma do spełnienia on sam?"
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
}

# Przykładowe użycie
<?php
// Ładowanie klasy filmweba
require_once 'classes/filmweb.php';

// Ładowanie klasy Remote
require_once 'classes/remote.php';

// Zwróci nam informacje o filmie Matrix
var_dump(Filmweb_Parser::getMovie('Matrix'));
?>

# TODO
Piszcie co dodać - jaką funkcjonalność :)