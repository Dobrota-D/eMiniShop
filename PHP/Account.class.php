<?php 

class Account {
    public $id;
    public $username;
    public $email;
    private $password;
    public $created;

    function __construct($id, $username, $password, $email, $is_Admin) {
        echo "Test constructor called";
        $this->username = $username;
        $this->email = $email;
        $this->id = $id;
        $this->is_Admin = $is_Admin;
        $this->setPassword($password);
        $this->created = date('Y-m-d H:i:s');
    }

    function setPassword($password) {
        $this->password = hash('sha256', $password);
    }

    function getPassword() {
        return $this->password;
    }

    public static function generateAccount() {
        return new Account("testor", random_int(0,100));
    }
}

?>