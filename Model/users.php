<?php 
class Users {
    public $uid;
    public $firstName;
    public $lastName;
    public $email;

    function __construct($uid, $firstName, $lastName, $email){
        $this->uid = $uid;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

}