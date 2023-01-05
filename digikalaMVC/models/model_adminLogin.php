<?php

class model_adminLogin extends Model
{

    function __construct()
    {
        parent::__construct();
        $level=Model::getuserlevel();
        if ($level!=1 and $level!=2){
            header('location:'.URL.'adminlogin');
        }
    }

    function check($form){
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
