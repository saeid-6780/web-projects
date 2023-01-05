<?php

class model_login extends Model{

    function __construct()
    {
        parent::__construct();
    }

    function index(){

    }

    function checkuser($form){
        $email=$form['email'];
        $password=$form['password'];

        $sql='select * from tbl_user WHERE email=? AND password=?';
        $result=$this->doSelect($sql,[$email,$password]);

        if (sizeof($result)>0 and !empty($email) and !empty($password)){
            echo 'khode khodeshe';
            Model::sessionInit();
            Model::sessionSet('userid',$result[0]['id']);
        }else{
            echo 'bigirinesh';
        }
    }

}

?>