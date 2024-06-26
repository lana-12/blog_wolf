<!DOCTYPE html>
<html lang="fr">

<?php

// Inclure le fichier de configuration
require_once './config/config.php';

echo $_SERVER['QUERY_STRING'];



require_once(dirname(__FILE__) . '/views/includes/head.php');

?>

<body>

        <?php
            require_once(dirname(__FILE__) . '/views/includes/header.php');
        ?>

    <main class="" id="app">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Library</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
    </nav>

        <?php
            require_once(dirname(__FILE__) . '/core/router.php') ;
        ?>

    </main>


        <?php
            require_once(dirname(__FILE__) . '/views/includes/footer.php');
        ?>


    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>