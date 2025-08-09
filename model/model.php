<?php
class model extends mainDB{
    protected $table;
    protected $base;
    protected $type;
    protected $columnString;
    protected $valueString;
    protected $parts;
    protected $where = [];
    protected static $comma;
    protected $offset;
    protected $limit;
    

    public static function select(array $fields=["*"]){
        $obj = static::creatObject();
        $obj->type = "select";
        $obj->base = "SELECT " . implode(",", $fields);
        //var_dump($->base);
        return $obj;
    }

    public static function delete(){
        self::$type = "delete";
        $obj = static::creatObject();
        $obj->base = "DELETE FROM " . $obj->table;
        return $obj;
    }

    public function where(string $field, $value, string $operator = '='){
        //$obj = static::creatObject();
        $this->where=[];
        $this->where[]= " $field $operator $value ";
        $this->base.= " WHERE " . implode(' ',$this->where);
        // var_dump($this->base);
        //if($obj->type==""){
           // $obj->select();
        //}
        return $this;
    }

    public static function create($data){
       $obj = static::creatObject();
       $columns = [];
       $values = [];

       foreach ($data as $key => $value){
        $columns[] = $key;
        $values[] = "'$value'";
       }
       $obj->columnString = implode(",", $columns);
       $obj->valueString = implode(",", $values);


       $obj->base = "INSERT " . " INTO " . $obj->table . "($obj->columnString) VALUES ($obj->valueString)";
       return $obj;
    }

    public static function update($data){
        $obj = static::creatObject();
        self::$type = "update";
        $obj->parts = "";
        self::$comma = " ";
        foreach ($data as $key => $value){
            $obj->parts .= self::$comma . "$key = '$value'";
            self::$comma = ", ";
        }
        $obj->base = "UPDATE " . $obj->table . " SET " .  $obj->parts;
        return $obj;
    }
    
    public static function limit($limit, $offset){
        echo "aylar";
        $obj = static::creatObject();
       //$obj = $this->creatObject();
       // if($from<$to){
       //  $limit = $to-$from;
       //  $offset = $from;
       // else if($from>$to){
       //  $limit=$from-$to;
       //  $offset=$to;
       // }
           $obj->base = " SELECT * FROM " . $obj->table . " LIMIT " . $limit . " OFFSET  " . $offset;
        return $obj;
    }
    

    public function sort($field , $sortingType){
    //$obj = static::creatObject();
    $result = $this->get();
    for($i=0; $i<$result->num_rows; $i++){
       //var_dump($result);
       $products[]=$result->fetch_assoc();
    }
    $count = count($products);
    if($sortingType == 'desc'){
       for($i=0; $i<$count; $i++){
           for($j=0; $j<$count-1; $j++){
               if($products[$j][$field]<$products[$j+1][$field]){
                   $x = $products[$j];
                   $products[$j] = $products[$j+1];
                   $products[$j+1] = $x;
                   }
                }
             }
    }else if($sortingType == 'asc'){
       for($i=0; $i<$count; $i++){
           for($j=0; $j<$count-1; $j++){
               //if($j==count($products)-1);
               if($products[$j][$field]>$products[$j+1][$field]){
                   $x = $products[$j];
                   $products[$j] = $products[$j+1];
                   $products[$j+1] = $x;
                }
            }
        }
    }
    // var_dump($products);
    return $products;
}


public static function all(){
    $obj = static::creatObject();
    $obj->base =  " SELECT * FROM " . $obj->table;
    // var_dump($obj->base);
    return $obj->get();
}

//  public function First($a,$b){
    //     $obj = static::creatObject();
    //     $first = $obj->select();
    //     $obj->base.= " LIMIT " . $a . " OFFSET  " . $b;
    //     //var_dump($obj->base);
    //      return $obj;
    //  }
    
    public function pageNate($limit){
        $obj = static::creatObject();
        if("page"==$GLOBALS['urlArray'][3]){
            $page=$GLOBALS['urlArray'][4];
            $offset = ($page-1)*$limit;
            $obj->base = " SELECT * FROM " . $obj->table . " LIMIT " . $limit . " OFFSET  " . $offset;
        }
        // var_dump($obj->base);
        return $obj;
        // $obj->base .=$obj->pagenet;
    }
    public static function find($id){
        $obj = static::creatObject();
        $obj->base = " SELECT * FROM " . $obj->table;
        //$obj->where("id","=",$id);
        $obj->where[] = "id = $id";
        return $obj->get();
    }
    
    // public function with($field, $table){
        //     //$obj = static::creatObject();
        //     //var_dump($obj->base);
        //     foreach($this->related as $key =>$value){
            //         $objcat = factory::factory($table)->select([$key])->from()->where($value[0],$value[1]);
            //         $this->base .= 
            //         //$this->base .= ",(". "SELECT " . $field . " FROM " . $table . " WHERE " . implode("=", $value) . ")" . "category_title ";
            //         return $this;
            //     }
            
            //     // $this->base .= $obj->base;
            // }
            
            public function with($table){
                $this->$table($table::$filable);
                return $this;
            }

            public static function count(){
                $obj=static::createObject();
                 $x= $obj->select(['COUNT','(*)'])->from();
                 var_dump($x);
                //$obj->base= "SELECT COUNT(*) FROM" . $obj->table;
                return $obj->get();
            }
            
    public function from(){
     $this->base .= " FROM " . $this->table;
    //  var_dump($this->base);

     return $this;
    }

    // public function belongsTo($fields, $className){
    //    $obj = factory::factory($className);

    //     foreach($fields as $key=>$value){
    //     $objcat = $obj->select([$key])->from()->where($value[0],$value[1]);
    //     $this->base .= ",(".$objcat->base.") ".$className."_".$key;
    // }
    // $this->base .= $obj->base;
    //     return $this;
    // }
    
    public function belongsTo($fields, $className){
       $obj = factory::factory($className);

        foreach($fields as $key=>$value){
        $objcat = $obj->select([$value])->from()->where($this->related[$className][0],$this->related[$className][1]);
        $this->base .= ",(".$objcat->base.") " .$className. "_" .$value;
    }
    $this->base .= $obj->base;
        return $this;
    } 

    public function get(){
        //$obj = static::creatObject();
        $sql = $this->base;
        if(!empty($this->where)){
        $sql .= " WHERE " . implode(' ',$this->where);
        }if (in_array($this->type, ['select'])){
        $sql .= " FROM " . $this->table;
        }
        $sql .=";";
        var_dump($sql);
        $result = $this->connection->query($sql);
        return $result;
        
    }
    }












    // public function get(){

    //     if($this->querySelect){
    //         $this->query = $this->querySelect;
    //     }else if($this->queryDelete){
    //         $this->query = $this->queryDelete . $this->queryWhere;
    //     }else if($this->queryInsert){
    //         $this->query = $this->queryInsert;
    //     }else if($this->queryFind){
    //         $this->query = $this->queryFind . $this->queryWhere;
    //     }else if($this->queryUpdate){
    //         $this->query = $this->queryUpdate . $this->queryWhere;
    //     }
          
    //     $result = $this->connection->query($this->query);
    //     //var_dump($this->query);
    //     return $result;
    //  }
//  public function update($data){
//         $this->type = "update";
//         $parts = [];

//         foreach ($data as $key => $value){
//             $parts[] = "$key = '$value'";
//             $this->partString = implode(",", $parts);
//         }
//         $this->queryBase = "UPDATE " . $this->table . " SET " .  $this->partString;
//         //var_dump($this->queryBase);
//         return $this;
//     }