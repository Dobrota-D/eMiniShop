<?php 

class Article {
    public $id_article;
    public $name_article;
    public $description_article;
    private $quantity_article;
    public $price_article;

    function __construct() {
        
    }



    public function hydrate(array $datas){
        foreach($datas as $key => $value) {
             $this->$key = $value;
            
        }
    }

}

?>