<?php

require_once(dirname(__FILE__) . '/../utils/functions.php');




// Fonction pour lire le fichier CSV et retourner un tableau associatif
function getCategory() {
    $categories = [];
    $file_path= dirname(__FILE__) .'/../datas/categories.csv';

    if (file_exists(($file_path))) {
        $file_pointer = fopen($file_path, 'r');

        while ($data = fgetcsv($file_pointer, null, ',')) {
            $categories[]= [
                'id'=> $data[0],
                'title'=> $data[1],
                'description'=> $data[2],
            ];
        }
        fclose($file_pointer);
        return $categories;

    } else {
        echo 'Oups, une erreur est survenue lors de l\'ouverture du fichier !!!';
    }
}



function getCategoryById($id) {
    $categories = getCategory(); 

    foreach ($categories as $category) {
        if ($category['id'] == $id) {
            return $category;
        }
    }

    return null; 
}