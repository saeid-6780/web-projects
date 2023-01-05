<?php

class ShowCart4 extends controller{

    function __construct()
    {
    }

    function index($status=''){
        $data=['status'=>$status];
        $this->view('showCart4/index',$data);

    }

    function checkcode($code){
        $result=$this->model->checkcode($code);
        $totalprice=$this->model->calculatetotalprice($code);
        $array=[$result,$totalprice];
        echo json_encode($array);
    }

    function calculatetotalprice(){
        $totalprice=$this->model->calculatetotalprice($_POST['code']);
        echo $totalprice;
    }

    function saveorder(){
        $this->model->saveorder($_POST);
    }
}

?>