<?php 

class Category {
    public $id_category;
    public $name_category;

    function __construct() {
        
    }



    public function hydrate(array $datas){
        foreach($datas as $key => $value) {
             $this->$key = $value;
            
        }
    }

}

?>