<?php

class adminStats extends Controller
{

    function __construct()
    {
        parent::__construct();

    }

    function index(){
        $this->view('admin/stats/index');
    }

    function order(){
        $stats=$this->model->order($_POST);
        $x=['stats'=>$stats];
        $this->view('admin/stats/order',$x);
    }

}

?>