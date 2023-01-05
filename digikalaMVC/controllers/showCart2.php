<?php

class ShowCart2 extends controller{

    function __construct()
    {
    }

    function index(){
        $address=$this->model->getaddress();
        $posttype=$this->model->getposttype();
        $data=['address'=>$address,'posttype'=>$posttype];
        $this->view('showCart2/index',$data);
    }

    function addaddress($editaddressid){
        $this->model->addaddress($_POST,$editaddressid);

    }

    function editaddress($addressid){
        $addressinfo=$this->model->addressinfo($addressid);
        echo json_encode($addressinfo);
    }

    function getpostprice(){
        $data=$_POST;
        $this->model->getpostprice($data);
    }

    function sessionposttype(){
        $data=$_POST;
        $this->model->sessionposttype($data);
    }

    function deleteaddress($id){
        $this->model->deleteaddress($id);
    }

}

?>