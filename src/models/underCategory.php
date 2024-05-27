<?php

require_once(dirname(__FILE__) . '/../utils/functions.php');



// Retrieve undercategories
function getUnderCategories($folder) {
    $undercategories = [];
    $introCategorie = [];

    // $file_path= dirname(__FILE__) .'/../datas/undercategories.csv';
    $file_path= dirname(__FILE__) .'/../datas/'.$folder.'/undercategories.csv';

    if (file_exists(($file_path))) {
        $file_pointer = fopen($file_path, 'r');

        while ($data = fgetcsv($file_pointer, null, ';')) {

            if ($data[0] == 0){
                $introCategorie[] = [
                    'id' => $data[0],
                    'intro' => $data[1],
                ];

            } else {
                $undercategories[]= [
                    'id'=> $data[0],
                    'title'=> $data[1],
                    'description'=> $data[2],
                    'category_id'=> $data[3],
                ];

            }
            
        }
        fclose($file_pointer);

    } else {
        echo 'Oups, une erreur est survenue lors de l\'ouverture du fichier !!!';
    }

    return ['data' => $undercategories, 'introCategorie' => $introCategorie];

   
}


// Retrieve name of the undercategory by id
function getNameUnderCategoryById($id, $folder) {
    $results = getUnderCategories($folder); 
    $underCategories = $results['data']; 

    foreach ($underCategories as $underCategory) {
        if ($underCategory['id'] == $id) {
            return $underCategory;
        }
    }

    return null; 
}
