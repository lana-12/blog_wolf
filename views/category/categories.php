<?php

require(dirname(__FILE__) . '/../../src/utils/functions.php');
require(dirname(__FILE__) . '/../../src/models/category.php');


$categories = getCategories();

// dump($categories);

?>

<section class="container mt-5">
    <h2 class="mb-4">Catégories</h2>
    <div class="row">
        <div class="col m-4">
            <?php foreach ($categories as $categorie): ?>
                <a href="/index.php?page=categorie&id=<?= htmlspecialchars($categorie['id']) ?>" class="btn btn-secondary m-3"> 
                
                    <?= htmlspecialchars($categorie['title']) ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>