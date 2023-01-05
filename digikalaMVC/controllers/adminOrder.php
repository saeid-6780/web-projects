<?php

class adminOrder extends Controller
{

    function __construct()
    {
        parent::__construct();
        $level=Model::getuserlevel();
        if ($level!=1){
            header('location:'.URL.'adminlogin');
        }
    }

    function index(){
        $orders=$this->model->getorders();

        $data=['orders'=>$orders];
        $this->view('admin/order/index',$data);
    }

    function details($orderid){
        $orderinfo=$this->model->getorderinfo($orderid);
        $orderstatus=$this->model->orderstatus();

        $data=['orderinfo'=>$orderinfo,'orderstatus'=>$orderstatus];
        $this->view('admin/order/details',$data);
    }

    function editorder($orderid){
        $this->model->editorder($orderid,$_POST);
    }

    function showfactor($orderid){
        $orderinfo=$this->model->getorderinfo($orderid);

        $data=['orderinfo'=>$orderinfo];
        $this->view('admin/order/factor',$data,1,1);

    }

    function delete(){
        $this->model->delete($_POST);
        header('location:'.URL.'adminorder');
    }

}
?>