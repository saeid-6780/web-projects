<?php

class ShowCart3 extends controller{

    function __construct()
    {
    }

    function index(){

        $basketinfo=$this->model->getbasketreview();
        $postprice=$this->model->postprice();
        Model::sessionInit();
        $addressinfo=Model::sessionGet('addressinfo');
        $addressinfo=unserialize($addressinfo);

        $posttype=Model::sessionGet('posttype');

        $data=['basketinfo'=>$basketinfo,'addressinfo'=>$addressinfo,'posttype'=>$posttype,'postprice'=>$postprice];

        $this->view('showCart3/index',$data);
    }
}

?>