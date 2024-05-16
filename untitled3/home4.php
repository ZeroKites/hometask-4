<?php

function renameFiles($sourceDir, $destinationDir)
{

   
    if (!is_dir($destinationDir)) {
        mkdir($destinationDir, 0777, true);
    }


    $files = scandir($sourceDir);


    foreach ($files as $file) {

        if ($file == '.' || $file == '..') {
            continue;
        }


        $source = $sourceDir . '/' . $file;
        $destination = $destinationDir . '/' . $file;


        $i = 1;
        while (file_exists($destination)) {
            $pathInfo = pathinfo($file);
            $filename = $pathInfo['filename'] . "_copy{$i}." . $pathInfo['extension'];
            $destination = $destinationDir . '/' . $filename;
            $i++;
        }


        copy($source, $destination);
    }
}


$sourceDir = 'files';
$destinationDir = 'files_new';


renameFiles($sourceDir, $destinationDir);

