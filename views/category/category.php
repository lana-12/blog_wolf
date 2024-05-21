<?php

require(dirname(__FILE__) . '/../../src/utils/functions.php');
require(dirname(__FILE__) . '/../../src/models/category.php');


// Revoir les différentes catégories, peut-etre groupé qqles unes

if (isset($_GET['id'])) {
    $categoryId = intval($_GET['id']);
    var_dump($categoryId);
    $category = getCategoryById($categoryId);
    
    if ($category) {

        echo "<h2>" . htmlspecialchars($category['id']) . "</h2>";
        echo "<h2>" . htmlspecialchars($category['title']) . "</h2>";

    } else {
        echo "<p>Catégorie non trouvée.</p>";
    }

} else {
    echo "<p>Aucune catégorie spécifiée.</p>";
}
?>

