<?php

require(dirname(__FILE__) . '/../../src/utils/functions.php');
require(dirname(__FILE__) . '/../../src/models/category.php');
require(dirname(__FILE__) . '/../../src/models/underCategory.php');

// Mapping des sous-catégories aux fichiers CSV
$subCategoryFiles = [
    1 => 'meute.csv',
    2 => 'hierarchie.csv',
    3 => 'anatomie.csv',
    16 => 'dreams.csv'
];


if (isset($_GET['id']) && isset($_GET['categorie'])) {
    // Retrieve name folder
    //dump($_GET['categorie']);
    $folder = $_GET['categorie'];

    // Retrieve id underCategorie
    $subCategoryId = (int)$_GET['id'];
    //dump($subCategoryId);
    
    $underCategory = getNameUnderCategoryById($subCategoryId, $folder );
    //dump($underCategory);

    if ($subCategoryId && isset($underCategory)) {
        // Chemin du fichier CSV pour la sous-catégorie
        $filename = strtolower($underCategory['title']);

        $subCategoryData = getDataFromCsv($folder, $filename);
        //dump($subCategoryData);

    } else {
        echo '
        <div class="alert alert-danger m-5" role="alert">
            <p class="text-center">Une erreur est survenue ! Sous-catégorie non trouvée ou fichier CSV manquant.</p>
        </div>';
}
 
} else {
    echo '
        <div class="alert alert-danger m-5" role="alert">
            <p class="text-center">Une erreur est survenue, aucune sous-catégorie trouvée !</p>
        </div>';
}

?>

<main class="container mt-5">
    <section>
        <h2 class="text-center"><?= htmlspecialchars($underCategory['title']) ?> </h2>
        <p class="mt-4"> <?= htmlspecialchars($underCategory['description']) ?> </p>

    </section>

    <div class="row">
        <div class="col m-4">
            <div class="d-flex justify-content-center flex-wrap">
    
                <?php foreach ($subCategoryData as $dataRow): ?>
                    
                    <div class="mt-3" >
                        <img src="..." class="img-fluid" alt="Image de Loup">
                        <div class="">
                            <h5 class="cardTitle"><?= $dataRow['title'] ?></h5>
                            <p class="cardText"><?= $dataRow['description'] ?></p>

                            
                        </div>
                    </div>
                    
                <?php endforeach; ?>
    
            </div>
        </div>

    </div>
</main>
