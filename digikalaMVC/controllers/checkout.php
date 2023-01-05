<?php

class Checkout extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index($orderid=''){
        if (isset($_GET['Authority'])){
            $orderinfo=$this->model->zarinpalcheckout($_GET);

        }
        else if (isset($orderid)){
            $orderinfo=$this->model->getorderinfo($orderid);
        }
        $data=['orderinfo'=>$orderinfo];
        $this->view('checkout/index',$data);
    }

    function payonline($orderid){
        $this->model->payonline($orderid);
    }

    function showerror(){
        $error=$_GET['error'];
        $orderid=$_GET['orderid'];
        $data=['error'=>$error,'orderid'=>$orderid];
        $this->view('checkout/showerror',$data);
    }

    function creditcard($orderid){


        if (isset($_POST['day'])){
            $this->model->updatecreditcard($_POST,$orderid);
        }

        $orderinfo=$this->model->getorderinfo($orderid);
        $data=['orderinfo'=>$orderinfo];
        $this->view('checkout/creditcard',$data);
    }
}

?>