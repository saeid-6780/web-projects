<?php

class adminSlider extends controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_POST['title']) and isset($_FILES['image'])){
            $this->model->addslider($_POST,$_FILES);
        }
        $slider=$this->model->getslider();
        $data=['slider'=>$slider];
        $this->view('admin/slider/index',$data);
    }

    function delete(){
        $this->model->delete($_POST);
        header('location:'.URL.'adminslider/index');
    }

}
?>