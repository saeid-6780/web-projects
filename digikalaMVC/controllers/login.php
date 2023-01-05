<?php

class Login extends controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view('login/index');
    }

    function checkuser(){
        $form=$_POST;
        $this->model->checkuser($form);
        Model::sessionInit();
        $check=Model::sessionGet('userid');
        if ($check==false){
            header('location:'.URL.'login');
        }else{
            echo 'hameh chi halle';
            header('location:'.URL.'panel');
        }
    }
}

?>