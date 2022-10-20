<?php

    $fileName = $_GET['archivo'];
    $filePath = './compartido/'.$fileName;

    if(!empty($fileName) && file_exists($filePath)) {
    
        header("Content-Type: application/force-download");
        header("Content-Transfer-Encoding: binary");
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        readfile($filePath);
		exit;

    }else{
            
      echo "No se encuentra el archivo.";
    }
?>