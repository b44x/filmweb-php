<?php
/**
 * @author          nSolutions.pl <biuro(at)nsolutions(dot)pl>
 * @copyright       (c) 2012 nSolutions.pl
 * @description     Filmweb.pl Parser
 * @version         0.1b
 */
class Filmweb_Parser
{
    const URL = 'http://www.filmweb.pl/';
    const VERSION = '0.1b';
    const COOKIES = '../cookies';
    
    // Przypisanie gatunków po ID
    public static $genres = array
    (
        2 => "animacja",
        3 => "biograficzny",
        4 => "dla dzieci",
        5 => "dokumentalny",
        6 => "dramat",
        7 => "erotyczny",
        8 => "familijny",
        9 => "fantasy",
        10 => "surrealistyczny",
        11 => "historyczny",
        12 => "horror",
        13 => "komedia",
        14 => "kostiumowy",
        15 => "kryminał",
        16 => "melodramat",
        17 => "musical",
        18 => "nowele filmowe",
        19 => "obyczajowy",
        20 => "przygodowy",
        22 => "sensacyjny",
        24 => "thriller",
        25 => "western",
        26 => "wojenny",
        27 => "film-noir",
        28 => "akcja",
        29 => "komedia obycz.",
        30 => "komedia rom.",
        32 => "romans",
        33 => "sci-fi",
        37 => "dramat obyczajowy",
        38 => "psychologiczny",
        39 => "satyra",
        40 => "katastroficzny",
        41 => "dla młodzieży",
        42 => "baśń",
        43 => "polityczny",
        44 => "muzyczny",
        45 => "etiuda",
        46 => "dreszczowiec",
        47 => "czarna komedia",
        50 => "krótkometrażowy",
        51 => "religijny",
        52 => "prawniczy",
        53 => "gangsterski",
        54 => "karate",
        55 => "biblijny",
        57 => "dokumentalizowany",
        58 => "komedia kryminalna",
        59 => "dramat historyczny",
        60 => "groteska filmowa",
        61 => "sportowy",
        62 => "poetycki",
        63 => "szpiegowski",
        64 => "edukacyjny",
        65 => "dramat sądowy",
        66 => "anime",
        67 => "niemy",
        68 => "płaszcza i szpady",
        69 => "dramat społeczny",
        70 => "fabularyzowany dok.",
        71 => "xxx",
        72 => "sztuki walki",
        73 => "przyrodniczy",
        74 => "komedia dokumentalna",
        75 => "fikcja literacka",
        76 => "propagandowy"
    );
    
    public static $regexps = array
    (
        // Nazwa filmu
        'title' => array
        (
            'reg' => '/<a typeof="v:Review-aggregate" href=".+?" title=.* property="v:name" property="v:itemreviewed">(.+?)<\/a>/is',
            'data' => 1,
            'all' => FALSE
        ),
        // Tytuł oryginalny
        'origTitle' => array
        (
            'reg' => '/<h2 class=origTitle>(.+?)<\/h2>/is',
            'data' => 1,
            'all' => FALSE
        ),
        // Opis
        'description' => array
        (
            'reg' => '/<span class=filmDescrBg property="v:summary">(.+?)<\/span>/is',
            'data' => 1,
            'all' => FALSE,
            'filter' => 'strip_tags' 
        ),
        // Rok produkcji
        'year' => array
        (
            'reg' => '/<span id=filmYear class=filmYear> \(([0-9]{4})\) <\/span>/is',
            'data' => 1,
            'all' => FALSE
        ),
        // Gatunek
        'genres' => array
        (
            'reg' => '/<a href="\/search\/film\?genreIds=([0-9]+)">(.+?)<\/a>/is',
            'data' => 1,
            'all' => TRUE,
            'references' => array('Filmweb_Parser', 'genres'),
        ),
    );
    
   /**
    * Funkcja odpowiedzialna za pobranie informacji o filmie.
    * @param string $path 
    * @return array
    */
    public static function getMovie($path)
    {
        // Trzymamy ciasteczka (czasami wyskakują reklamy)
        Remote::$default_options += array
        (
            CURLOPT_COOKIEFILE => dirname(__FILE__) . DIRECTORY_SEPARATOR . Filmweb_Parser::COOKIES . DIRECTORY_SEPARATOR . 'filmweb',
            CURLOPT_COOKIEJAR => dirname(__FILE__) . DIRECTORY_SEPARATOR . Filmweb_Parser::COOKIES . DIRECTORY_SEPARATOR . 'filmweb',
        );
        
        // Wywowałmy filmweba.pl - dla usunięcia reklamy.
        Remote::get(Filmweb_Parser::URL);

        $request = Filmweb_Parser::URL;
        $response = Remote::get($request.$path);
        
        $data = new stdClass();
        foreach(Filmweb_Parser::$regexps as $k => $r)
        {
            if($r['all'])
                preg_match_all($r['reg'], $response, $found);
            else
                preg_match($r['reg'], $response, $found);
            
            if(isset($found[$r['data']]))
            {
                if($r['all'])
                {
                    if($r['references'])
                    {
                        $a = array();
                        foreach($found[$r['data']] as $key => $v)
                        {
                            $ref = $r['references'][0]::$$r['references'][1];
                            
                            $a[] = array
                            (
                                'key' => $v,
                                'value' => $ref[$v]
                            );
                        }
                    }
                    
                    $data->$k = $a;
                }
                else
                {
                    if(isset($r['filter']))
                        $data->$k = call_user_func($r['filter'], $found[$r['data']]);
                    else
                        $data->$k = $found[$r['data']];
                }
            }
        }
        
        return $data;
    }
}