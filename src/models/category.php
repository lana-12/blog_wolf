<?php

require_once(dirname(__FILE__) . '/../utils/functions.php');




// Fonction pour lire le fichier CSV et retourner un tableau associatif
function getCategories() {
    $categories = [];
    $file_path= dirname(__FILE__) .'/../datas/categories.csv';

    if (file_exists(($file_path))) {
        $file_pointer = fopen($file_path, 'r');

        while ($data = fgetcsv($file_pointer, null, ',')) {
            $categories[]= [
                'id'=> $data[0],
                'title'=> $data[1],
            ];
        }
        fclose($file_pointer);

        return $categories;

    } else {
        echo 'Oups, une erreur est survenue lors de l\'ouverture du fichier des catégories !!!';
    }
}


// Retrieve category by id
function getCategoryById($id) {
    $categories = getCategories(); 

    foreach ($categories as $category) {
        if ($category['id'] == $id) {
            return $category;
        }
    }

    return null; 
}



// Retrieve data of the file csv
function getDataFromCsv($folderName, $fileName) {
    $file_path = dirname(__FILE__) . '/../datas/' . $folderName.'/'.$fileName.'.csv';
    dump($file_path);
    $dataCsv = [];

    if (file_exists($file_path)) {
        $file_pointer = fopen($file_path, 'r');

        while ($data = fgetcsv($file_pointer, null, ';')) {
                
            $dataCsv[] = [
                'id' => $data[0],
                'title' => $data[1],
                'description' => $data[2],
                'underCategory_id' => $data[3]
            ];
            
        }
        fclose($file_pointer);
    } else {
        echo 'Ouppppps, une errrreur est survenue lors de l\'ouverture du fichier !!!';
    }

    return $dataCsv;
}
