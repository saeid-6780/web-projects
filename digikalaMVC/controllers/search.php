<?php

class Search extends controller{

    function __construct()
    {
    }

    function index($categoryid){
        $attr=$this->model->getattr($categoryid);
        $attrright=$this->model->getattrright($categoryid);
        $colors=$this->model->getColors();
        $data=['attr'=>$attr,'attrright'=>$attrright,'colors'=>$colors];
        $this->view('search/index',$data);
    }

    function dosearch(){

         echo json_encode($this->model->dosearch($_POST));

    }
}

?>