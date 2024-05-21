<?php

require(dirname(__FILE__) . '/../../src/utils/functions.php');
require(dirname(__FILE__) . '/../../src/models/category.php');

// Mapping des sous-catégories aux fichiers CSV
$subCategoryFiles = [
    1 => 'meute.csv',
    2 => 'hierarchie.csv',
    3 => 'anatomie.csv',
    18 => 'dreams.csv'
];


if (isset($_GET['id'])) {

$subCategoryId = (int)$_GET['id'] ;
$underCategory = getNameUnderCategoryById($subCategoryId);

    if ($subCategoryId && isset($subCategoryFiles[$subCategoryId])) {
        // Chemin du fichier CSV pour la sous-catégorie
        $filename = $subCategoryFiles[$subCategoryId];

        // Chargement des données du fichier CSV
        $result = getDataFromCsv($filename);
        $subCategoryData = $result['data'];
        $specialLinks = $result['specialLinks'];

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

<?php if ($specialLinks ) : ?>
    <div class="row">
        <div class="col">
            <h3>Voici quelques liens pour en savoir plus</h3>
            <?php $links= $specialLinks[0]['link']; 
                foreach ($links as $link):  ?>
                    <ul>
                        <li>
                            <a href=<?= htmlspecialchars($link) ?> target="_blank" rel="noopener noreferrer">
                            <?= htmlspecialchars(extractDomainName($link)) ?>
                            </a>
                        </li>
                    </ul>               
                <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>


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
