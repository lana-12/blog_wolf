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
        echo 'Oups, une erreur est survenue lors de l\'ouverture du fichier !!!';
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


// Retrieve undercategories
function getUnderCategories() {
    $undercategories = [];

    $file_path= dirname(__FILE__) .'/../datas/undercategories.csv';

    if (file_exists(($file_path))) {
        $file_pointer = fopen($file_path, 'r');

        while ($data = fgetcsv($file_pointer, null, ';')) {
            $undercategories[]= [
                'id'=> $data[0],
                'title'=> $data[1],
                'description'=> $data[2],
                'category_id'=> $data[3],
            ];
        }
        fclose($file_pointer);
        return $undercategories;

    } else {
        echo 'Oups, une erreur est survenue lors de l\'ouverture du fichier !!!';
    }
   
}


// Retrieve name of the undercategory by id
function getNameUnderCategoryById($id) {
    $underCategories = getUnderCategories(); 

    foreach ($underCategories as $underCategory) {
        if ($underCategory['id'] == $id) {
            return $underCategory;
        }
    }

    return null; 
}


// Retrieve data of the file csv
function getDataFromCsv($filename) {
    $file_path = dirname(__FILE__) . '/../datas/' . $filename;
    $dataCsv = [];
    $specialLinks = [];

    if (file_exists($file_path)) {
        $file_pointer = fopen($file_path, 'r');

        while ($data = fgetcsv($file_pointer, null, ';')) {
            if ($data[0] == 0) {
                
                // Ligne avec id=0, traiter comme un lien spécial
                $specialLinks[] = [
                    'id' => $data[0],
                    'title' => $data[1],
                    'link' => [
                        $data[2],
                        $data[3],
                        $data[4],
                        $data[5],
                    ]
                ];
                
            } else {
                // Autres lignes, traiter comme des données régulières
                $dataCsv[] = [
                    'id' => $data[0],
                    'title' => $data[1],
                    'description' => $data[2],
                    'underCategory_id' => $data[3]
                ];
            }
        }
        fclose($file_pointer);
    } else {
        echo 'Oups, une erreur est survenue lors de l\'ouverture du fichier !!!';
    }

    return ['data' => $dataCsv, 'specialLinks' => $specialLinks];
}
