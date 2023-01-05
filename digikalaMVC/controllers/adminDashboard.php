<?php

class adminDashboard extends Controller{
    function __construct()
    {
        parent::__construct();
        $level=Model::getuserlevel();
        if ($level!=1 and $level!=2){
            header('location:'.URL.'adminlogin');
        }
    }

    function index(){
        $orderstat=$dates=$this->model->getstats();
        $data=['orderstat'=>$orderstat];
        $this->view('admin/dashboard/index',$data);
    }

}
?>