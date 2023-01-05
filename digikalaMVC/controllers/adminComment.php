<?php

class adminComment extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $comment=$this->model->getcomment();
        $data=['comment'=>$comment];
        $this->view('admin/comment/index',$data);
    }

    function confirm(){
        $this->model->confirm($_POST);
        header('location:'.URL.'adminComment');
    }

    function unconfirm(){
        $this->model->unconfirm($_POST['id']);
        header('location:'.URL.'adminComment');
    }

    function delete(){
        $this->model->delete($_POST['id']);
        header('location:'.URL.'adminComment');
    }

}

?>