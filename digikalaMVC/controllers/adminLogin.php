<?php

class adminLogin extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view('admin/login/index');
    }

    function check(){
        $form=$_POST;
        $this->model->check($form);
        Model::sessionInit();
        $check=Model::sessionGet('userid');
        if ($check==false){
            header('location:'.URL.'adminlogin');
        }else{
            echo 'hameh chi halle';
            header('location:'.URL.'admindashboard');
        }
    }

}

?>