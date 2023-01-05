<?php

class admin extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){

        $this->view('admin/index');
    }

    function category(){
        $category=$this->model->getCategory();
        $data=['category'=>$category];
        $this->view('admin/category',$data);
    }

}

