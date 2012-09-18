<?php
ini_set('display_errors', 'on');
// Ładowanie klasy filmweba
require_once 'classes/filmweb.php';

// Ładowanie klasy Remote
require_once 'classes/remote.php';
echo '<pre>';
var_dump(Filmweb_Parser::getMovie('Matrix'));
echo '</pre>';