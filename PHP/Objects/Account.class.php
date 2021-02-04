<?php 

class Account {
    public $id_user;
    public $username;
    public $email;
    private $password;
    public $creation_date;
    public $is_admin;

    function __construct() {
        
    }



    public function hydrate(array $datas){
        foreach($datas as $key => $value) {
             $this->$key = $value;
            
        }
    }

}

?>