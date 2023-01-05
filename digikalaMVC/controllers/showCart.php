<?php

class ShowCart extends controller{

    function __construct()
    {
    }

    function index(){
        $basketinfo=$this->model->getbasket();
        $basket=$basketinfo[0];
        $price_total_all=$basketinfo[1];
        $data=['basket'=>$basket,'price_total_all'=>$price_total_all];

        $this->view('showCart/index',$data);
    }

    function deletebasket($basketid){
        $this->model->deletebasket($basketid);
        $basketinfo=$this->model->getbasket();
        echo json_encode($basketinfo);
    }

    function updatebasket1(){
        $this->model->updatebasket($_POST);
        $basketinfo=$this->model->getbasket();
        echo json_encode($basketinfo);

    }

}

?>