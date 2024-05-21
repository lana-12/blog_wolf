<?php


/**
 * Retrieve DomainName complet ex=> wwww.exemple.fr
 * @param url of the file csv
 * 
 */
function extractDomainName($url){

    // dump($_SERVER["HTTP_REFERER"]);
    // dump(parse_url($_SERVER["HTTP_REFERER"], PHP_URL_HOST));

    preg_match('/https?:\/\/(www\.[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})/', $url, $matches);

    if (!empty($matches[1])) {
        $domain = $matches[1];
        return $domain;  
    } 
    return null;

}


/**
 * makes var_dump more readable
 * @param variable
 * @return void
 */
function dump($variable)
{
    echo '
        <pre>';

            var_dump($variable);
    echo 
        '</pre>';
}










/**
 * Sort by alpha order
 * @param array $users
 * @param string $sort
 * @param string $order
 * @return array
 */
function sortAlpha(&$users, $sort, $order)
{
    //Check params
    // dump('sort : ' .$sort);
    // dump('order : '.$order);
    $cmp = function ($a, $b) use ($sort, $order) {
        if ($order === 'asc') return strcmp($a[$sort], $b[$sort]);
        else return strcmp($b[$sort], $a[$sort]);
    };
    // sorts multi-dimensional arrays
    usort($users, $cmp);
}


/**
 * Retrieves order based on what has already been clicked via $_GET
 * @return array 
 */
function getSortOrder()
{
    $sorts = [
        "firstname" => "asc",
        "lastname" => "asc",
        "email" => "asc"
    ];

    // Checking the sort and order keys in the querystring
    if (isset($_GET["sort"])) {
        if (isset($_GET["order"])) {
            $sorts[$_GET["sort"]] = $_GET["order"] === "asc" ? "desc" : "asc";
        }
    }
    return $sorts;
}


