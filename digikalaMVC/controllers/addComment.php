<?php

class AddComment extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index($productid){
        $params=$this->model->getparam($productid);
        $productinfo=$this->model->productinfo($productid);
        $commentinfo=$this->model->commentinfo($productid);
        $data=['params'=>$params,'productinfo'=>$productinfo,'commentinfo'=>$commentinfo];
        $this->view('addComment/index',$data);
    }

    function savecomment($productid){
        $this->model->savecomment($_POST,$productid);
    }

}

?>