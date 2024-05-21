<?php


$pageMappings = [
    'àPropos' => 'about.php',
    'category' => [
        'categorie' => 'category/category.php',
        'categories' => 'category/categories.php'
    ],
    'user' => [
        'membres' => 'user/teams.php',
        'creation' => 'user/createUser.php',
        'delete' => 'user/delete.php',
        'update' => 'user/update.php'
    ],
    'connexion' => 'login.php',
    'deconnexion' => 'logout.php'
];

// Default Page
$page = 'home.php';

// Function for search the page in the array $pageMappings
function findPage($key, $mappings) {
    foreach ($mappings as $section => $routes) {
        if (is_array($routes)) {
            if (array_key_exists($key, $routes)) {
                return $routes[$key];
            }
        } elseif ($section === $key) {
            return $routes;
        }
    }
    return null;
}


if (isset($_GET['page'])) {
    $foundPage = findPage($_GET['page'], $pageMappings);
    if ($foundPage) {
        $page = $foundPage;
    }
}

require_once(dirname(__FILE__) . '/../views/' . $page);
?>
