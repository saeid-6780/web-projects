<?php

class adminUser extends Controller
{

    function __construct()
    {
        parent::__construct();

    }

    function index()
    {
        $user=$this->model->getuser();
        $data=['user'=>$user];
        $this->view('admin/user/index',$data);
    }

    function chengelevel1(){
        $ids=$_POST['id'];
        $this->model->chengelevel1($ids);
        header('location:'.URL.'adminuser');
    }
    function chengelevel2(){
        $ids=$_POST['id'];
        $this->model->chengelevel2($ids);
        header('location:'.URL.'adminuser');
    }
}
?>