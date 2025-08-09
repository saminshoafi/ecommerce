<?php
// class autoLoader{
//     public function myfunction($className){
//         $file = $className.".php";
//         if(file_exists($file)){
//             include($file);
//         }else{
//             echo "file not found";
//         }
//     }
// }
// $autoloader=new autoLoader;
// spl_autoload_register([$autoloader,"myfunction"]);

///////////////////////////////////////////////////////////////////////////////////////

class autoLoader{
    public function myfunction($classname){
        if($classname=="mainDB" || $classname=="category" || $classname=="product" || $classname=="user" || $classname=="footer" || $classname=="model"){
            $classname = "model/".$classname;
        }
        include($classname.".php");
    }
}
$autoloader=new autoLoader;
spl_autoload_register([$autoloader,"myfunction"]);