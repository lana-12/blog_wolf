<?php

require(dirname(__FILE__) . '/../../src/utils/functions.php');
require(dirname(__FILE__) . '/../../src/models/category.php');
require(dirname(__FILE__) . '/../../src/models/underCategory.php');



if (isset($_GET['id'])) {
    
    $categoryId = intval($_GET['id']);
    $category = getCategoryById($categoryId);

    // dump(strtolower($category['title']));
    // dump($category['title']);

    $folder = strtolower($category['title']);
    // dump($folder);

    if ($category) {
        $result = getUnderCategories($folder);
        
        
        $undercategories = $result['data'];
        // dump($undercategories);
        
        
        $intro = $result['introCategorie'][0]['intro'];
        // dump($intro);

    } else {
        echo '
            <div class="alert alert-danger m-5" role="alert">
                <p class="text-center">Catégorie non trouvée.</p>
            </div>';
    }

} else {
    echo '
        <div class="alert alert-danger m-5" role="alert">
            <p class="text-center">Aucune catégorie spécifiée.</p>
        </div>';
}

?>

    <section class="container mt-5">
        <div class="row">
            <div class="col">
                <h2 class="text-center mb-4"><?= htmlspecialchars($category['title']) ?></h2>
                <h2 class="mb-4"><?= htmlspecialchars($category['id']) ?></h2>
                <p><?= htmlspecialchars($intro) ?></p>
            </div>
        </div>


        

    </section>        

    <main class="row">
        <div class="col m-4">
            <div class="d-flex justify-content-center flex-wrap">

                <?php foreach ($undercategories as $undercategory): 
                    if ($undercategory['category_id'] === $category['id']) :
                    ?>
                    
                        <div class="card my-3" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title "><?= $undercategory['title'] ?></h5>
                                
                                <a href="/index.php?categorie=<?= htmlspecialchars(strtolower($category['title'])) ?>&page=detail&id=<?= htmlspecialchars($undercategory['id']) ?>" class="btn btn-primary m-3"> En savoir plus</a>

                            </div>
                        </div>
                    
                    <?php endif; ?>
                <?php endforeach; ?>

            </div>
        </div>
    </main>
       
        
        

