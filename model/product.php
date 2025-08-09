<?php

class product extends model{

    protected  $table = "product";
    protected  $related = ["category"=>["category_id","id"]];
    

    public function category(array $fields){
        $this->belongsTo($fields, category::class);
        return $this;
   }
    
}

?>