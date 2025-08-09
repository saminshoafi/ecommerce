<?php
class loadFile{
    public function load($fileName){

        $file = $fileName.".php";
        if(file_exists($file)){
            include($file);
        }else{
            echo "File not found:".$file;
        }
      }
    }
    //$loadFile = new loadFile;
    // $loadFile->load();
